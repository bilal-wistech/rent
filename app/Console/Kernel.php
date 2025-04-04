<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Bookings;
use App\Models\Currency;
use App\Models\PropertyDates;
use App\Models\SkippedRenewalBooking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Stringable;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $currencyDefault = Currency::getAll()->where('default', 1)->first();
            $bookings = Bookings::where('renewal_type', 'yes')
                ->where('is_booking_renewed', 0)
                ->whereDate('end_date', '<=', now())
                ->where('renewed_booking_id', 0)
                ->get();

            try {
                DB::beginTransaction();

                foreach ($bookings as $booking) {
                    try {
                        $booking_start_date = Carbon::parse($booking->start_date);
                        $booking_end_date = Carbon::parse($booking->end_date);
                        $daysDifference = $booking_start_date->diffInDays($booking_end_date);
                        $renewBookingStartDate = $booking_end_date->copy()->addDays(1);
                        $renewBookingEndDate = $renewBookingStartDate->copy()->addDays($daysDifference);

                        // Check for existing bookings during the proposed renewal period
                        $conflictingBookings = Bookings::where('property_id', $booking->property_id)
                            ->where(function ($query) use ($renewBookingStartDate, $renewBookingEndDate) {
                                $query->whereBetween('start_date', [$renewBookingStartDate, $renewBookingEndDate])
                                    ->orWhereBetween('end_date', [$renewBookingStartDate, $renewBookingEndDate])
                                    ->orWhere(function ($subQuery) use ($renewBookingStartDate, $renewBookingEndDate) {
                                        $subQuery->where('start_date', '<=', $renewBookingStartDate)
                                            ->where('end_date', '>=', $renewBookingEndDate);
                                    });
                            })
                            ->exists();

                        // If there are conflicting bookings, log and skip this renewal
                        if ($conflictingBookings) {
                            Log::warning('Booking Renewal Skipped: Conflicts exist for Property ID ' . $booking->property_id .
                                ' from ' . $renewBookingStartDate->toDateString() .
                                ' to ' . $renewBookingEndDate->toDateString());

                            // Optional: Store skipped renewal information
                            $this->storeSkippedRenewal($booking, $renewBookingStartDate, $renewBookingEndDate);

                            continue;
                        }

                        $renewedBooking = new Bookings();
                        $renewedBooking->property_id = $booking->property_id;
                        $renewedBooking->user_id = $booking->user_id;
                        $renewedBooking->host_id = $booking->host_id;
                        $renewedBooking->booking_added_by = $booking->booking_added_by ?? 1;
                        $renewedBooking->start_date = $renewBookingStartDate;
                        $renewedBooking->end_date = $renewBookingEndDate;
                        $renewedBooking->guest = $booking->guest;
                        $renewedBooking->total_night = $booking->total_night;
                        $renewedBooking->service_charge = $booking->service_charge ?? 0;
                        $renewedBooking->host_fee = $booking->host_fee ?? 0;
                        $renewedBooking->iva_tax = $booking->iva_tax ?? 0;
                        $renewedBooking->accomodation_tax = $booking->accomodation_tax ?? 0;
                        $renewedBooking->guest_charge = $booking->guest_charge ?? 0;
                        $renewedBooking->security_money = $booking->security_money ?? 0;
                        $renewedBooking->cleaning_charge = $booking->cleaning_charge ?? 0;
                        $renewedBooking->total = $booking->total;
                        $renewedBooking->base_price = $booking->base_price ?? 0;
                        $renewedBooking->currency_code = $booking->currency_code;
                        $renewedBooking->booking_type = $booking->booking_type;
                        $renewedBooking->renewal_type = $booking->renewal_type ?? 'none';
                        $renewedBooking->status = $booking->status;
                        $renewedBooking->cancellation = $booking->cancellation;
                        $renewedBooking->per_night = $booking->per_night;
                        $renewedBooking->transaction_id = $booking->transaction_id;
                        $renewedBooking->payment_method_id = $booking->payment_method_id;
                        $renewedBooking->pricing_type_id = $booking->pricing_type_id;
                        $renewedBooking->buffer_days = $booking->buffer_days ?? 0;
                        $renewedBooking->save();

                        // Calculate dates for property dates
                        $start_date = date('Y-m-d', strtotime($booking_end_date->addDay()));
                        $end_date = date('Y-m-d', strtotime($booking_end_date->addDays($daysDifference)));
                        $start_date_timestamp = strtotime($start_date);
                        $end_date_timestamp = strtotime($end_date);
                        $min_days = ($end_date_timestamp - $start_date_timestamp) / 86400;

                        // Create booked dates
                        $bookedDates = [];
                        for ($i = $start_date_timestamp; $i <= $end_date_timestamp; $i += 86400) {
                            $bookedDates[] = date("Y-m-d", $i);
                        }

                        // Insert property dates
                        foreach ($bookedDates as $date) {
                            PropertyDates::create([
                                'property_id' => $booking->property_id,
                                'booking_id' => $booking->id,
                                'date' => $date,
                                'price' => ($booking->per_night) ? $booking->per_night : '0',
                                'status' => 'booked not paid',
                                'min_day' => $min_days,
                                'min_stay' => 1,
                            ]);
                        }

                        // Update original booking
                        $booking->renewed_booking_id = $renewedBooking->id;
                        $booking->renewal_date = $start_date;
                        $booking->is_booking_renewed = 1;
                        $booking->save();
                        Log::info($booking->id . ': Booking: ' . $booking_start_date);
                        Log::info($booking->id . ': Booking: ' . $booking_end_date);
                        Log::info($booking->id . ': Booking: ' . $daysDifference);
                        Log::info($renewedBooking->id . ': Renew Booking: ' . $renewBookingStartDate);
                        Log::info($renewedBooking->id . ': Renew Booking: ' . $renewBookingEndDate);

                        Log::info('Booking renewed successfully: Original ID ' . $booking->id . ', New ID ' . $renewedBooking->id);

                    } catch (\Exception $innerException) {
                        Log::error('Booking Renewal Error for Booking ID ' . $booking->id . ': ' . $innerException->getMessage());
                        continue;
                    }
                }

                DB::commit();

            } catch (\Exception $outerException) {
                DB::rollBack();
                Log::error('Batch Booking Renewal Error: ' . $outerException->getMessage());
                throw $outerException;
            }

            Log::info("Booking renewal process completed.");
        })->everyMinute()
            ->onSuccess(function (Stringable $output) {
                Log::info("Booking Renewal Process Finished.");
            });
    }

    protected function storeSkippedRenewal($booking, $renewStartDate, $renewEndDate)
    {
        // You can create a new model for tracking skipped renewals
        // This is a placeholder method to demonstrate logging skipped renewals
        // Implement according to your specific requirements
        SkippedRenewalBooking::create([
            'booking_id' => $booking->id,
            'property_id' => $booking->property_id,
            'start_date' => $renewStartDate,
            'end_date' => $renewEndDate,
            'reason' => 'Conflicting bookings exist'
        ]);
    }
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
