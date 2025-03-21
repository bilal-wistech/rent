<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Properties; // Adjust if your model namespace is different
use Illuminate\Support\Str;

class generatePropertySlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:PropertySlugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate slugs for all properties, overriding existing ones.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get all properties
        $properties = Properties::all();

        if ($properties->isEmpty()) {
            $this->info('No properties found in the database.');
            return Command::SUCCESS;
        }

        $count = 0;
        foreach ($properties as $property) {
            // Generate slug from the name column
            $slug = Str::slug($property->name);

            // Check if slug already exists and make it unique if needed
            $originalSlug = $slug;
            $counter = 1;

            while (Properties::where('slug', $slug)
                ->where('id', '!=', $property->id)
                ->exists()
            ) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            // Update the property with new slug if it's different
            if ($property->slug !== $slug) {
                $oldSlug = $property->slug ?? 'none';
                $property->slug = $slug;
                $property->save();
                $count++;
                $this->info("Updated slug for '{$property->name}': {$oldSlug} -> {$slug}");
            }
        }

        if ($count > 0) {
            $this->info("Successfully updated slugs for {$count} properties.");
        } else {
            $this->info("No slug updates were necessary - all slugs were up to date.");
        }

        return Command::SUCCESS;
    }
}
