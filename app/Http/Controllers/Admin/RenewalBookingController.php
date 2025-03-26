<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Bookings;
use App\Models\Properties;
use Illuminate\Http\Request;
use App\Models\PropertyDates;
use App\Models\PropertyPrice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTables\RenewalBookingDataTable;

class RenewalBookingController extends Controller
{
    public function index(RenewalBookingDataTable $dataTable)
    {
        $data['from'] = isset(request()->from) ? request()->from : null;
        $data['to'] = isset(request()->to) ? request()->to : null;

        if (isset(request()->property)) {
            $data['properties'] = Properties::where('properties.id', request()->property)->select('id', 'name')->get();
        } else {
            $data['properties'] = null;
        }
        if (isset(request()->customer)) {
            $data['customers'] = User::where('users.id', request()->customer)->select('id', 'first_name', 'last_name')->get();
        } else {
            $data['customers'] = null;
        }

        if (!empty(request()->btn) || !empty(request()->status) || !empty(request()->from) || !empty(request()->property) || !empty(request()->customer)) {

            $status = request()->status;
            $from = request()->from;
            $to = request()->to;
            if (isset(request()->property)) {
                $property = request()->property;
            } else {
                $property = null;
            }

            if (isset(request()->customer)) {
                $customer = request()->customer;
            } else {
                $customer = null;
            }
        } else {
            $status = null;
            $property = null;
            $customer = null;
            $from = null;
            $to = null;
        }

        if (isset(request()->reset_btn)) {
            $data['from'] = null;
            $data['to'] = null;
            $data['allstatus'] = null;
            $data['allproperties'] = null;
            $data['allcustomers'] = null;
            return $dataTable->render('admin.renewal-bookings.index', $data);
        }
        isset(request()->property) ? $data['allproperties'] = request()->property : $data['allproperties'] = '';
        isset(request()->customer) ? $data['allcustomers'] = request()->customer : $data['allcustomers'] = '';
        isset(request()->status) ? $data['allstatus'] = request()->status : $data['allstatus'] = '';
        return $dataTable->render('admin.renewal-bookings.index', $data);
    }
    public function cancelRenewalBooking(Request $request)
    {
        Bookings::where('id', $request->booking_id)->update([
            'is_booking_renewed' => -1,
            'renewal_booking_cancel_date' => Carbon::now()->toDateString(),
            'renewal_booking_cancel_by' => Auth::guard('admin')->id(),
            'renewal_type' => 'no'
        ]);
        return response()->json([
            'success' => true,
        ]);
    }
    public function renewal(Request $request, $id)
    {
        $property_id = Bookings::findOrFail($id)->property_id;
        $customer_id = Bookings::findOrFail($id)->user_id;
        // $booking = Bookings::findOrFail($id);
        // $properties = Properties::all('id', 'name');
        // $customers = User::where('status', 'Active')->get();
        // $maxGuests = Properties::findOrFail($booking->property_id)->accommodates;
        // return view('admin.bookings.edit', compact('booking', 'properties', 'customers', 'maxGuests'));
        $propertyName = Properties::findOrFail($property_id)->name;

        $customerName = User::findOrFail($customer_id)->first_name . ' ' . User::findOrFail($customer_id)->last_name;
        $numberOfGuests = Properties::findOrFail($property_id)->accommodates ?? 0;
        $booking = Bookings::findOrFail($id);
        $propertyDates = PropertyDates::where('property_id', $property_id)
            ->where(function ($query) use ($booking) {
                $query->where('date', $booking->start_date)
                    ->orWhere('date', $booking->end_date);
            })
            ->get();

        $status = null;
        if ($propertyDates->isNotEmpty()) {
            $status = $propertyDates->first()->status;
        }

        return view('admin.renewal-bookings.renew', compact('property_id', 'propertyName', 'customer_id', 'customerName', 'numberOfGuests', 'booking', 'propertyDates', 'status'));
    }
    public function checkExistingPropertyBookingInRenewal(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'booking_id' => 'required|exists:bookings,id',
        ]);

        $booking = Bookings::with([
            'properties.property_dates',
            'users'
        ])->where('id', $validated['booking_id'])
            ->first();

        $property_price = PropertyPrice::with('pricingType')
            ->where('property_id', $validated['property_id'])
            ->get();

        if ($booking) {
            $property_dates = $booking->properties->property_dates;

            $start_date = Carbon::parse($booking->start_date);
            $end_date = Carbon::parse($booking->end_date);
            $booking_duration = $start_date->diffInDays($end_date);

            $new_start_date = $end_date->addDay();
            $new_end_date = $new_start_date->copy()->addDays($booking_duration);

            $overlapping_bookings = Bookings::where('property_id', $validated['property_id'])
                ->where(function ($query) use ($new_start_date, $new_end_date) {
                    $query->whereBetween('start_date', [$new_start_date, $new_end_date])
                        ->orWhereBetween('end_date', [$new_start_date, $new_end_date])
                        ->orWhere(function ($query) use ($new_start_date, $new_end_date) {
                            $query->where('start_date', '<=', $new_start_date)
                                ->where('end_date', '>=', $new_end_date);
                        });
                })
                ->where('id', '!=', $validated['booking_id'])
                ->exists();

            if ($overlapping_bookings) {
                $existing_bookings = Bookings::where('property_id', $validated['property_id'])
                    ->where('end_date', '>=', $new_start_date)
                    ->orderBy('end_date', 'asc')
                    ->get();

                $found_slot = false;
                $check_date = $new_start_date->copy();

                while (!$found_slot) {
                    $new_start_date = $check_date->copy();
                    $new_end_date = $new_start_date->copy()->addDays($booking_duration);

                    $has_overlap = Bookings::where('property_id', $validated['property_id'])
                        ->where(function ($query) use ($new_start_date, $new_end_date) {
                            $query->whereBetween('start_date', [$new_start_date, $new_end_date])
                                ->orWhereBetween('end_date', [$new_start_date, $new_end_date])
                                ->orWhere(function ($query) use ($new_start_date, $new_end_date) {
                                    $query->where('start_date', '<=', $new_start_date)
                                        ->where('end_date', '>=', $new_end_date);
                                });
                        })
                        ->exists();

                    if (!$has_overlap) {
                        $found_slot = true;
                    } else {
                        $check_date->addDay();
                    }
                }
            }

            return response()->json([
                'exists' => true,
                'message' => 'Original booking from ' . $start_date->format('d-m-Y') .
                    ' to ' . $end_date->format('d-m-Y') .
                    '. Next available renewal dates from ' . $new_start_date->format('d-m-Y') .
                    ' to ' . $new_end_date->format('d-m-Y'),
                'booking_id' => $booking->id,
                'suggested_renewal_dates' => [
                    'start_date' => $new_start_date->format('Y-m-d'), // Changed to Y-m-d format
                    'end_date' => $new_end_date->format('Y-m-d'),     // Changed to Y-m-d format
                ],
                'booking' => $booking,
                'property_dates' => $property_dates,
                'user' => [
                    'user_id' => $booking->users->id,
                    'user_name' => $booking->users->first_name . " " . $booking->users->last_name,
                ],
                'property_price' => $property_price
            ]);
        }

        return response()->json([
            'exists' => false,
            'property_price' => $property_price
        ]);
    }
    public function storeRenewalBooking(Request $request)
    {
        // dd($request->all());
        // Add this for debugging
        Log::info('storeRenewalBooking called with data:', $request->all());

        $booking = Bookings::findOrFail($request->booking_id);
        // dd($request->all());
        try {
            DB::beginTransaction();

            $renewal_start_date = Carbon::parse($request->start_date);
            $renewal_end_date = Carbon::parse($request->end_date);
            $daysDifference = $renewal_start_date->diffInDays($renewal_end_date);

            $conflictingBookings = Bookings::where('property_id', $booking->property_id)
                ->where(function ($query) use ($renewal_start_date, $renewal_end_date) {
                    $query->whereBetween('start_date', [$renewal_start_date, $renewal_end_date])
                        ->orWhereBetween('end_date', [$renewal_start_date, $renewal_end_date])
                        ->orWhere(function ($subQuery) use ($renewal_start_date, $renewal_end_date) {
                            $subQuery->where('start_date', '<=', $renewal_start_date)
                                ->where('end_date', '>=', $renewal_end_date);
                        });
                })
                ->where('id', '!=', $booking->id)
                ->exists();

            if ($conflictingBookings) {
                return back()->with('error', 'Booking renewal failed: There are conflicting bookings for the selected dates.');
            }

            $renewedBooking = new Bookings();
            $renewedBooking->property_id = $booking->property_id;
            $renewedBooking->user_id = $booking->user_id;
            $renewedBooking->host_id = $booking->host_id;
            $renewedBooking->booking_added_by = $request->booking_added_by ?? Auth::guard('admin')->id();
            $renewedBooking->start_date = $renewal_start_date;
            $renewedBooking->end_date = $renewal_end_date;
            $renewedBooking->guest = $request->number_of_guests ?? $booking->guest;
            $renewedBooking->total_night = $daysDifference;
            $renewedBooking->service_charge = $request->guest_service_charge ?? $booking->service_charge ?? 0;
            $renewedBooking->host_fee = $request->host_service_charge ?? $booking->host_fee ?? 0;
            $renewedBooking->iva_tax = $request->iva_tax ?? $booking->iva_tax ?? 0;
            $renewedBooking->accomodation_tax = $request->accomodation_tax ?? $booking->accomodation_tax ?? 0;
            $renewedBooking->guest_charge = $request->guest_fee ?? $booking->guest_charge ?? 0;
            $renewedBooking->security_money = $request->security_fee ?? $booking->security_money ?? 0;
            $renewedBooking->cleaning_charge = $request->cleaning_fee ?? $booking->cleaning_charge ?? 0;
            $renewedBooking->total = $request->total_price_with_charges_and_fees ?? $booking->total;
            $renewedBooking->base_price = $request->total_price ?? $booking->base_price ?? 0;
            $renewedBooking->currency_code = $booking->currency_code;
            $renewedBooking->booking_type = $request->booking_type ?? $booking->booking_type;
            $renewedBooking->renewal_type = $request->renewal_type ?? $booking->renewal_type ?? 'none';
            $renewedBooking->status = $request->status ?? $booking->status;
            $renewedBooking->cancellation = $booking->cancellation;
            $renewedBooking->per_night = $request->per_day_price ?? $booking->per_night;
            $renewedBooking->transaction_id = $booking->transaction_id;
            $renewedBooking->payment_method_id = $booking->payment_method_id;
            $renewedBooking->pricing_type_id = $request->pricing_type_id ?? $booking->pricing_type_id;
            $renewedBooking->buffer_days = $request->buffer_days ?? $booking->buffer_days ?? 0;
            $renewedBooking->booking_property_status = $request->booking_property_status ?? 'booked not paid';
            $renewedBooking->renewed_booking_id_from = $booking->id;
            $renewedBooking->save();

            $start_date_timestamp = $renewal_start_date->timestamp;
            $end_date_timestamp = $renewal_end_date->timestamp;
            $min_days = ($end_date_timestamp - $start_date_timestamp) / 86400;

            $bookedDates = [];
            for ($i = $start_date_timestamp; $i <= $end_date_timestamp; $i += 86400) {
                $bookedDates[] = date("Y-m-d", $i);
            }

            foreach ($bookedDates as $date) {
                PropertyDates::create([
                    'property_id' => $booking->property_id,
                    'booking_id' => $renewedBooking->id,
                    'date' => $date,
                    'price' => $renewedBooking->per_night ?? 0,
                    'status' => 'booked not paid',
                    'min_day' => $min_days,
                    'min_stay' => 1,
                ]);
            }

            $booking->renewed_booking_id = $renewedBooking->id;
            $booking->renewal_date = $renewal_start_date;
            $booking->is_booking_renewed = 1;
            $booking->save();

            Log::info("Booking renewed successfully: Original ID {$booking->id}, New ID {$renewedBooking->id}");
            Log::info("Renewal dates: Start {$renewal_start_date}, End {$renewal_end_date}, Days {$daysDifference}");

            DB::commit();

            return redirect()->route('admin.bookings.index')
                ->with('success', 'Booking renewed successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Booking Renewal Error for Booking ID {$booking->id}: " . $e->getMessage());
            return back()->with('error', 'Booking renewal failed: ' . $e->getMessage());
        }
    }
}
