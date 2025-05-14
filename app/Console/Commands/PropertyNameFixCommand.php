<?php

namespace App\Console\Commands;

use App\Models\BedType;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\SpaceType;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use NumberFormatter;

class PropertyNameFixCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:PropertyNameFix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Changes the property names and slugs (old ones) to proper naming convention with bedroom count in words';

    /**
     * Convert number to word for bedroom count.
     *
     * @param int $number
     * @return string
     */
    protected function numberToWord($number)
    {
        // Create a NumberFormatter instance for English (en_US)
        $formatter = new NumberFormatter('en_US', NumberFormatter::SPELLOUT);
        // Capitalize the first letter of each word
        return ucwords($formatter->format($number));
    }

    /**
     * Generate a unique slug for a property.
     *
     * @param string $baseName
     * @param int $propertyId
     * @param array $slugsInUse
     * @return string
     */
    protected function generateUniqueSlug($baseName, $propertyId, &$slugsInUse)
    {
        // Generate the initial slug from the base name
        $baseSlug = Str::slug($baseName);
        $slug = $baseSlug;

        // Add property ID to ensure uniqueness if the slug already exists
        if (isset($slugsInUse[$slug])) {
            $slug = $baseSlug . '-' . $propertyId;

            // In the rare case this is also taken, append a random string
            if (isset($slugsInUse[$slug])) {
                $slug = $baseSlug . '-' . $propertyId . '-' . Str::random(5);
            }
        }

        // Mark this slug as used
        $slugsInUse[$slug] = true;

        return $slug;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            DB::beginTransaction();

            // Cache bed types and property types for 1 hour
            $bedTypes = Cache::remember('bed_types', 3600, fn() => BedType::all()->keyBy('id'));
            $propertyTypes = Cache::remember('property_types', 3600, fn() => PropertyType::all()->keyBy('id'));
            $spaceTypes = Cache::remember('space_types', 3600, fn() => SpaceType::all()->keyBy('id'));

            // Fetch properties
            $allProperties = Properties::with('property_address')->select(['id', 'bedrooms', 'bed_type', 'property_type', 'space_type', 'name', 'slug'])->get();

            // Track slugs to avoid duplicates
            $slugsInUse = [];

            // Check existing slugs in database to avoid conflicts with properties not being updated
            $existingSlugs = Properties::select('slug')->pluck('slug')->toArray();
            foreach ($existingSlugs as $slug) {
                $slugsInUse[$slug] = true;
            }

            // Prepare batch updates
            $updates = $allProperties->map(function ($property) use ($bedTypes, $propertyTypes, $spaceTypes, &$slugsInUse) {
                // Check if property address exists first
                if (!$property->property_address) {
                    Log::warning("Missing address for property ID {$property->id}");
                    return null;
                }

                // Get related data - initialize variables with null to avoid undefined variable errors
                $bedType = null;
                $propertyType = null;
                $spaceType = null;

                // Get bed type if it exists
                if ($property->bed_type && isset($bedTypes[$property->bed_type])) {
                    $bedType = $bedTypes[$property->bed_type];
                }

                // Get property type if it exists
                if ($property->property_type && isset($propertyTypes[$property->property_type])) {
                    $propertyType = $propertyTypes[$property->property_type];
                }

                // Get space type if it exists
                if ($property->space_type && isset($spaceTypes[$property->space_type])) {
                    $spaceType = $spaceTypes[$property->space_type];
                }

                // Generate new name
                if ($bedType && $propertyType) {
                    // Validate bedrooms for standard format
                    if (!is_numeric($property->bedrooms) || $property->bedrooms < 0 || !is_int($property->bedrooms + 0)) {
                        Log::warning("Invalid bedroom count for property ID {$property->id}: {$property->bedrooms}");
                        return null;
                    }

                    // Use standard format with bedroom count as word
                    $bedroomWord = $this->numberToWord($property->bedrooms);
                    $newName = sprintf(
                        '%s %s Bedroom %s, %s',
                        $bedroomWord,
                        $bedType->name,
                        $propertyType->name,
                        $property->property_address->area
                    );
                } elseif ($spaceType) {
                    // Use only space type and area if bed type or property type is missing
                    $newName = sprintf(
                        '%s, %s',
                        $spaceType->name,
                        $property->property_address->area
                    );
                } else {
                    // Log warning if no valid type information is available
                    Log::warning("No valid type information (bed, property, or space) for property ID {$property->id}");
                    return null;
                }

                // Generate unique slug for this property
                $newSlug = $this->generateUniqueSlug($newName, $property->id, $slugsInUse);

                return [
                    'id' => $property->id,
                    'name' => $newName,
                    'slug' => $newSlug,
                ];
            })->filter()->toArray();

            // Perform batch update
            if (!empty($updates)) {
                Properties::upsert($updates, ['id'], ['name', 'slug']);
                $this->info(sprintf('Successfully updated %d properties with new names and slugs', count($updates)));
            } else {
                $this->warn('No properties were updated');
            }

            DB::commit();
            return Command::SUCCESS;

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Property name and slug update failed: ' . $e->getMessage());
            $this->error('An error occurred while updating property names and slugs. Check logs for details.');
            return Command::FAILURE;
        }
    }
}
