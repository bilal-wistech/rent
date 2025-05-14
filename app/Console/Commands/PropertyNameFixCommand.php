<?php

namespace App\Console\Commands;

use App\Models\BedType;
use App\Models\Properties;
use App\Models\PropertyType;
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

            // Fetch properties
            $allProperties = Properties::with('property_address')->select(['id', 'bedrooms', 'bed_type', 'property_type', 'name', 'slug'])->get();

            // Track slugs to avoid duplicates
            $slugsInUse = [];

            // Check existing slugs in database to avoid conflicts with properties not being updated
            $existingSlugs = Properties::select('slug')->pluck('slug')->toArray();
            foreach ($existingSlugs as $slug) {
                $slugsInUse[$slug] = true;
            }

            // Prepare batch updates
            $updates = $allProperties->map(function ($property) use ($bedTypes, $propertyTypes, &$slugsInUse) {
                // Validate bedrooms
                if (!is_numeric($property->bedrooms) || $property->bedrooms < 0 || !is_int($property->bedrooms + 0)) {
                    Log::warning("Invalid bedroom count for property ID {$property->id}: {$property->bedrooms}");
                    return null;
                }

                // Get related data
                $bedType = $bedTypes->get($property->bed_type);
                $propertyType = $propertyTypes->get($property->property_type);

                // Check if related records exist
                if (!$bedType || !$propertyType || !$property->property_address) {
                    Log::warning("Missing bed type, property type, or address for property ID {$property->id}");
                    return null;
                }

                // Convert bedroom count to word
                $bedroomWord = $this->numberToWord($property->bedrooms);

                // Generate new name with bedroom count as word
                $newName = sprintf(
                    '%s %s Bedroom %s, %s',
                    $bedroomWord,
                    $bedType->name,
                    $propertyType->name,
                    $property->property_address->area
                );

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
