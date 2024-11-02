<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Bookings;
use App\Models\PropertyDates;
use Illuminate\Console\Command;

class UpdatePropertyDates extends Command
{
    protected $signature = 'update:property-dates';
    protected $description = 'Update PropertyDates table based on bookings data';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $bookings = Bookings::all();

        foreach ($bookings as $booking) {
            // Convert start and end dates to Carbon instances
            $start_date = Carbon::parse($booking->start_date)->startOfDay();
            $end_date = Carbon::parse($booking->end_date)->endOfDay();

            // Calculate the difference in days
            $min_days = $start_date->diffInDays($end_date);

            // Retrieve all existing dates for the property
            $existingDates = PropertyDates::where('property_id', $booking->property_id)->get();

            // Create an array of booked dates within the range
            $bookedDates = [];
            for ($date = $start_date->copy(); $date->lte($end_date); $date->addDay()) {
                $bookedDates[] = $date->format('Y-m-d');
            }

            // Loop through existing dates to update statuses accordingly
            foreach ($existingDates as $existingDate) {
                if (in_array($existingDate->date, $bookedDates)) {
                    // If the date is in the booked range, update its status
                    $existingDate->update([
                        'status' => 'booked paid',
                        'min_day' => $min_days,
                        'min_stay' => $booking->total_night >= $min_days ? '1' : '0',
                    ]);
                } else {
                    // If the date is not booked, retain the existing status and clear optional fields
                    $existingDate->update([
                        'price' => null,
                        'min_day' => null,
                        'min_stay' => null,
                    ]);
                }
            }

            // Create new entries for booked dates that may not already exist
            foreach ($bookedDates as $date) {
                PropertyDates::updateOrCreate(
                    ['property_id' => $booking->property_id, 'date' => $date],
                    [
                        'price' => $booking->base_price ?: 0,
                        'status' => $booking->status,
                        'min_day' => $min_days,
                        'min_stay' => $booking->total_night >= $min_days ? '1' : '0',
                    ]
                );
            }
        }

        $this->info('Property dates updated successfully based on bookings.');
    }
}
