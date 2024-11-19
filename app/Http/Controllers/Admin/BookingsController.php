<?php

namespace App\Http\Controllers\Admin;

use DB, PDF, Session, Common, Excel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\{
    Controller,
    EmailController
};
use App\DataTables\BookingsDataTable;
use App\Exports\BookingsExport;
use App\Models\{
    BankDate,
    Bookings,
    BookingDetails,
    PropertyDates,
    PropertyType,
    Properties,
    User,
    Currency,
    SpaceType,
    Payouts,
    Settings,
    PayoutSetting,
    Wallet,
    TimePeriod
};
use Modules\DirectBankTransfer\Entities\DirectBankTransfer;
use App\Models\PaymentMethods;
use App\Http\Requests\AddAdminBookingRequest;
use App\Http\Requests\CheckExistingBookingRequest;
use App\Models\Invoice;
use App\Models\PropertyPrice;
use App\Models\PricingType;
use App\Models\PropertyFees;

class BookingsController extends Controller
{

    public function index(BookingsDataTable $dataTable)
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

        // if (n_as_k_c()) {
        //     Session::flush();
        //     return view('vendor.installer.errors.admin');
        // }

        //Calculating total customers, bookings and total amount in distinct currency
        $total_bookings_initial = $this->getAllBookings();
        $total_bookings_currency = $this->getAllBookings();

        $total_bookings = $this->getAllBookings();
        $data['total_bookings'] = $total_bookings->get()->count();

        $total_customers_initial = $total_bookings->select('user_id')->distinct();
        $data['total_customers'] = $total_customers_initial->get()->count();

        $different_currency_total_initial = $total_bookings_currency->select('bookings.currency_code as currency_code', DB::raw('SUM(bookings.total) AS total_amount'))->groupBy('currency_code');
        $different_currency_total = $different_currency_total_initial->get();

        $data['different_total_amounts'] = $this->getDistinctCurrencyTotalWithSymbol($different_currency_total);

        if (isset(request()->reset_btn)) {
            $data['from'] = null;
            $data['to'] = null;
            $data['allstatus'] = null;
            $data['allproperties'] = null;
            $data['allcustomers'] = null;
            return $dataTable->render('admin.bookings.view', $data);
        }

        //filtering total bookings, total customers and total amounts in different currecncy
        if ($from) {
            $total_bookings_initial = $total_bookings_initial->whereDate('bookings.created_at', '>=', $from);
            $total_customers_initial = $total_customers_initial->whereDate('bookings.created_at', '>=', $from);
            $different_currency_total_initial = $different_currency_total_initial->whereDate('bookings.created_at', '>=', $from);
        }
        if ($to) {
            $total_bookings_initial = $total_bookings_initial->whereDate('bookings.created_at', '<=', $to);
            $total_customers_initial = $total_customers_initial->whereDate('bookings.created_at', '<=', $to);
            $different_currency_total_initial = $different_currency_total_initial->whereDate('bookings.created_at', '<=', $to);
        }
        if ($property) {
            $total_bookings_initial = $total_bookings_initial->where('bookings.property_id', '=', $property);
            $total_customers_initial = $total_customers_initial->where('bookings.property_id', '=', $property);
            $different_currency_total_initial = $different_currency_total_initial->where('bookings.property_id', '=', $property);
        }
        if ($customer) {
            $total_bookings_initial = $total_bookings_initial->where('bookings.user_id', '=', $customer);
            $total_customers_initial = $total_customers_initial->where('bookings.user_id', '=', $customer);
            $different_currency_total_initial = $different_currency_total_initial->where('bookings.user_id', '=', $customer);
        }
        if ($status) {
            $total_bookings_initial = $total_bookings_initial->where('bookings.status', '=', $status);
            $total_customers_initial = $total_customers_initial->where('bookings.status', '=', $status);
            $different_currency_total_initial = $different_currency_total_initial->where('bookings.status', '=', $status);
        }

        $data['total_bookings'] = $total_bookings_initial->get()->count();
        $data['total_customers'] = $total_customers_initial->get()->count();
        $different_currency_total_initial = $different_currency_total_initial->get();

        if (count($different_currency_total_initial)) {
            $data['different_total_amounts'] = $this->getDistinctCurrencyTotalWithSymbol($different_currency_total_initial);
        } else {
            $data['different_total_amounts'] = NULL;
        }

        isset(request()->property) ? $data['allproperties'] = request()->property : $data['allproperties'] = '';
        isset(request()->customer) ? $data['allcustomers'] = request()->customer : $data['allcustomers'] = '';
        isset(request()->status) ? $data['allstatus'] = request()->status : $data['allstatus'] = '';
        return $dataTable->render('admin.bookings.view', $data);
    }
    public function create(Request $request)
    {
        $properties = Properties::all('id', 'name');
        $customers = User::where('status', 'Active')->get();
        return view('admin.bookings.create', compact('properties', 'customers'));
    }
    public function getNumberofGuests($property_id)
    {
        $propety = Properties::findOrFail($property_id);
        return response()->json([
            'numberofguests' => $propety->accommodates ?? 0
        ]);
    }
    // public function getBookingDetails($date)
    // {
    //     $booking = Bookings::where('start_date', '<=', $date)
    //         ->where('end_date', '>=', $date)
    //         ->with('properties', 'users')
    //         ->first();

    //     if ($booking) {
    //         return response()->json([
    //             'booking' => $booking,
    //             'property' => $booking->properties,
    //             'customer' => $booking->users
    //         ]);
    //     }

    //     return response()->json(null);
    // }

    public function checkExistingPropertyBooking(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $booking = Bookings::with([
            'properties.property_dates' => function ($query) use ($validated) {
                $query->whereBetween('date', [$validated['start_date'], $validated['end_date']]);
            },
            'users'
        ])
            ->where('property_id', $validated['property_id'])
            ->where(function ($query) use ($validated) {
                $query->where('start_date', '<=', $validated['end_date'])
                    ->where('end_date', '>=', $validated['start_date']);
            })
            ->first();
        $property_price = PropertyPrice::with('pricingType')->where('property_id', $validated['property_id'])->get();
        if ($booking) {

            $property_dates = $booking->properties->property_dates;
            return response()->json([
                'exists' => true,
                'booking_id' => $booking->id,
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
    public function calculateBookingPrice(Request $request)
    {
        $multiplierMapping = [
            'daily' => 1,
            'weekly' => 7,
            'monthly' => 30,
            'yearly' => 365,
        ];
        $pricingType = $request->get('pricingType');
        $pricingTypeAmount = $request->get('pricingTypeAmount');
        $startDate = $request->get('startDate');
        $endDate = $request->get('endDate');
        $property_id = $request->get('propertyId');
        $property = Properties::findOrFail($property_id);
        // Convert start and end dates to Carbon instances
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        $totalPrice = 0;
        // Calculate the difference in days
        $numberOfDays = $end->diffInDays($start);

        $rateMultiplier = $multiplierMapping[strtolower($pricingType)] ?? 1;
        // Calculate total price
        $totalPrice = ($numberOfDays / $rateMultiplier) * $pricingTypeAmount;
        $pricingTypeDetail = PricingType::where('name', $pricingType)->first();
        $propertyPrice = PropertyPrice::where('property_id', $property_id)->where('property_type_id', $pricingTypeDetail->id)->first();
        $totalPriceWithOtherCharges = $totalPrice + $propertyPrice->cleaning_fee + $propertyPrice->security_fee + ($propertyPrice->guest_fee * $property->accommodates);
        $propertyFee = PropertyFees::pluck('value', 'field');
        $host_service_charge = ($propertyFee['host_service_charge'] / 100) * $totalPrice;
        $guest_service_charge = ($propertyFee['guest_service_charge'] / 100) * $totalPrice;
        $iva_tax = ($propertyFee['iva_tax'] / 100) * $totalPrice;
        $accomodation_tax = ($propertyFee['accomodation_tax'] / 100) * $totalPrice;
        $totalPriceWithChargesAndFees = $totalPriceWithOtherCharges + $host_service_charge + $guest_service_charge + $iva_tax + $accomodation_tax;
        return response()->json([
            'pricingType' => $pricingType,
            'numberOfDays' => $numberOfDays,
            'rateMultiplier' => $rateMultiplier,
            'totalPrice' => $totalPrice,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'totalPriceWithOtherCharges' => $totalPriceWithOtherCharges,
            'totalPriceWithChargesAndFees' => $totalPriceWithChargesAndFees,
            'host_service_charge' => $host_service_charge,
            'guest_service_charge' => $guest_service_charge,
            'iva_tax' => $iva_tax,
            'accomodation_tax' => $accomodation_tax,
            'cleaning_fee' => $propertyPrice->cleaning_fee,
            'security_fee' => $propertyPrice->security_fee,
            'guest_fee' => ($propertyPrice->guest_fee * $property->accommodates)
        ]);
    }
    public function store(AddAdminBookingRequest $request)
    {
        $currencyDefault = Currency::getAll()->where('default', 1)->first();
        $property = Properties::findOrFail($request->property_id);
        $priceDetails = Common::getPrice($property->id, $request->checkin, $request->checkout, $request->number_of_guests);
        $priceData = json_decode($priceDetails);
        foreach ($priceData->date_with_price as $key => $value) {
            $allData[$key]['price'] = Common::convert_currency('', $currencyDefault->code, $value->original_price);
            $allData[$key]['date'] = setDateForDb($value->date);
        }
        // dd($priceData);
        DB::beginTransaction();
        try {
            // Check if we're updating an existing booking
            $bookingId = $request->booking_id ?? null;

            // If booking ID exists, update the existing booking, else create a new one
            $bookingData = [
                'property_id' => $request->property_id,
                'user_id' => $request->user_id,
                'host_id' => $property->host_id,
                'booking_added_by' => $request->booking_added_by ?? 1,
                'start_date' => setDateForDb($request->start_date),
                'end_date' => setDateForDb($request->end_date),
                'guest' => $request->number_of_guests,
                'total_night' => $priceData->total_nights,
                'service_charge' => Common::convert_currency('', $currencyDefault->code, $priceData->service_fee),
                'host_fee' => Common::convert_currency('', $currencyDefault->code, $priceData->host_fee),
                'iva_tax' => Common::convert_currency('', $currencyDefault->code, $priceData->iva_tax ?? 0), // Default to 0 if not set
                'accommodation_tax' => Common::convert_currency('', $currencyDefault->code, $priceData->accommodation_tax ?? 0), // Default to 0 if not set
                'guest_charge' => Common::convert_currency('', $currencyDefault->code, $priceData->additional_guest ?? 0), // Default to 0 if not set
                'security_money' => Common::convert_currency('', $currencyDefault->code, $priceData->security_fee ?? 0), // Default to 0 if not set
                'cleaning_charge' => Common::convert_currency('', $currencyDefault->code, $priceData->cleaning_fee ?? 0), // Default to 0 if not set
                'total' => Common::convert_currency('', $currencyDefault->code, $priceData->total ?? 0), // Default to 0 if not set
                'base_price' => Common::convert_currency('', $currencyDefault->code, $priceData->subtotal ?? 0), // Default to 0 if not set
                'currency_code' => $currencyDefault->code,
                'booking_type' => $request->booking_type,
                'renewal_type' => $request->renewal_type ?? 'none',
                'status' => $request->status,
                'cancellation' => $property->cancellation,
                'per_night' => Common::convert_currency('', $currencyDefault->code, $priceData->property_price ?? 0), // Default to 0 if not set
                'date_with_price' => json_encode($allData),
                'transaction_id' => '',
                'payment_method_id' => '',
                'time_period_id' => $request->time_period_id,
                'buffer_days' => $request->buffer_days ?? 0
            ];

            if ($bookingId) {
                // Update existing booking
                $booking = Bookings::findOrFail($bookingId);
                $booking->update($bookingData);
            } else {
                // Create new booking
                $booking = Bookings::create($bookingData);
            }

            $start_date = date('Y-m-d', strtotime($request->start_date));
            $end_date = date('Y-m-d', strtotime($request->end_date));

            // Convert the start and end dates to timestamps
            $start_date_timestamp = strtotime($start_date);
            $end_date_timestamp = strtotime($end_date);

            // Calculate the difference in days
            $min_days = ($end_date_timestamp - $start_date_timestamp) / 86400;

            // Retrieve all existing dates for the property
            $existingDates = PropertyDates::where('property_id', $request->property_id)->get();

            // Create an array of booked dates
            $bookedDates = [];
            for ($i = $start_date_timestamp; $i <= $end_date_timestamp; $i += 86400) {
                $bookedDates[] = date("Y-m-d", $i);
            }

            // Loop through existing dates to update statuses accordingly
            foreach ($existingDates as $existingDate) {
                if (in_array($existingDate->date, $bookedDates)) {
                    // If the date is in the booked range, update its status
                    $existingDate->update([
                        'status' => $request->property_date_status,
                        'min_day' => $min_days,
                        'min_stay' => ($request->min_stay) ? '1' : '0',
                    ]);
                } else {
                    // If the date is not booked, retain the existing status and clear the price
                    $existingDate->update([
                        'price' => null, // Optional: clear the price if you want
                        'min_day' => null, // Optional: clear min_day if you want
                        'min_stay' => null, // Optional: clear min_stay if you want
                    ]);
                }
            }

            // Create new entries for booked dates that may not already exist
            foreach ($bookedDates as $date) {
                PropertyDates::updateOrCreate(
                    ['property_id' => $request->property_id, 'date' => $date],
                    [
                        'price' => ($priceData->property_price) ? $priceData->property_price : '0',
                        'status' => $request->property_date_status,
                        'min_day' => $min_days,
                        'min_stay' => ($request->min_stay) ? '1' : '0',
                    ]
                );
            }


            Invoice::updateOrCreate(
                ['booking_id' => $booking->id], // Update existing invoice if booking ID matches
                [
                    'property_id' => $property->id,
                    'customer_id' => $request->user_id,
                    'currency_code' => $currencyDefault->code,
                    'created_by' => $request->booking_added_by ?? 1,
                    'invoice_date' => Carbon::now(),
                    'due_date' => Carbon::now()->addDays(5),
                    'description' => 'Booking invoice for ' . $property->name,
                    'sub_total' => Common::convert_currency('', $currencyDefault->code, $priceData->subtotal),
                    'grand_total' => Common::convert_currency('', $currencyDefault->code, $priceData->total),
                ]
            );

            DB::commit();
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Booking ' . ($request->booking_id ? 'updated' : 'created') . ' successfully',
                    'booking' => [
                        'id' => $booking->id,
                        'start_date' => $booking->start_date,
                        'end_date' => $booking->end_date,
                        'status' => $request->property_date_status,
                        'property_id' => $booking->property_id
                    ]
                ]);
            }
            Common::one_time_message('success', 'Booking ' . ($bookingId ? 'Updated' : 'Added') . ' Successfully');
            return redirect('admin/bookings');
        } catch (\Exception $e) {
            DB::rollBack();
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to ' . ($request->booking_id ? 'update' : 'create') . ' booking: ' . $e->getMessage()
                ], 500);
            }
            Common::one_time_message('error', 'Failed to ' . ($bookingId ? 'update booking' : 'add booking') . '. Please try again. ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function getPropertyDates($propertyId)
    {
        $propertyDates = PropertyDates::where('property_id', $propertyId)
            ->get()
            ->keyBy('date')
            ->map(function ($item) {
                return [
                    'status' => $item->status,
                    'price' => $item->price
                ];
            });

        return response()->json($propertyDates);
    }
    public function edit(Request $request, $id)
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

        return view('admin.bookings.create', compact('property_id', 'propertyName', 'customer_id', 'customerName', 'numberOfGuests', 'booking', 'propertyDates', 'status'));
    }
    public function update(Request $request, $id)
    {
        $currencyDefault = Currency::getAll()->where('default', 1)->first();
        $booking = Bookings::findOrFail($id);
        $priceDetails = Common::getPrice($request->property_id, $request->checkin, $request->checkout, $request->number_of_guests);
        $priceData = json_decode($priceDetails);
        $property = Properties::findOrFail($request->property_id);
        foreach ($priceData->date_with_price as $key => $value) {
            $allData[$key]['price'] = Common::convert_currency('', $currencyDefault->code, $value->original_price);
            $allData[$key]['date'] = setDateForDb($value->date);
        }
        DB::beginTransaction();
        try {
            $booking->update([
                'property_id' => $request->property_id,
                'user_id' => $request->user_id,
                'host_id' => $property->host_id,
                'booking_added_by' => $request->booking_added_by ?? 1,
                'start_date' => setDateForDb($request->checkin),
                'end_date' => setDateForDb($request->checkout),
                'guest' => $request->number_of_guests,
                'total_night' => $priceData->total_nights,
                'service_charge' => Common::convert_currency('', $currencyDefault->code, $priceData->service_fee),
                'host_fee' => Common::convert_currency('', $currencyDefault->code, $priceData->host_fee),
                'iva_tax' => Common::convert_currency('', $currencyDefault->code, $priceData->iva_tax),
                'accomodation_tax' => Common::convert_currency('', $currencyDefault->code, $priceData->accomodation_tax),
                'guest_charge' => Common::convert_currency('', $currencyDefault->code, $priceData->additional_guest),
                'security_money' => Common::convert_currency('', $currencyDefault->code, $priceData->security_fee),
                'cleaning_charge' => Common::convert_currency('', $currencyDefault->code, $priceData->cleaning_fee),
                'total' => Common::convert_currency('', $currencyDefault->code, $priceData->total),
                'base_price' => Common::convert_currency('', $currencyDefault->code, $priceData->subtotal),
                'currency_code' => $currencyDefault->code,
                'booking_type' => $request->booking_type,
                'renewal_type' => $request->renewal_type ?? 'none',
                'status' => $request->status,
                'cancellation' => $property->cancellation,
                'per_night' => Common::convert_currency('', $currencyDefault->code, $priceData->property_price),
                'date_with_price' => json_encode($allData),
                'transaction_id' => '',
                'payment_method_id' => '',
            ]);
            DB::commit();
            Common::one_time_message('success', 'Booking Updated Successfully');
            return redirect('admin/bookings');
        } catch (\Exception $e) {
            DB::rollBack();
            Common::one_time_message('error', 'Failed to update booking. Please try again.');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Get Distinct currency total with symbol
     *
     * @param array $different_currency_total      Distinct currency total
     * @return array $different_total_amounts      Distinct currency total with symbol
     */
    public function getDistinctCurrencyTotalWithSymbol($different_currency_total)
    {
        $different_total_amounts = null;
        foreach ($different_currency_total as $key => $value) {
            $current_currency_symbol = Currency::getAll()->where('code', $value->currency_code)->first();
            $different_total_amounts[$key]['total'] = moneyFormat($current_currency_symbol->symbol, $value->total_amount);
            $different_total_amounts[$key]['currency_code'] = $value->currency_code;
        }
        return $different_total_amounts;
    }

    public function details(Request $request)
    {
        $data['result'] = $result = Bookings::find($request->id);
        $data['result']['bank'] = DirectBankTransfer::first()->data;
        $data['bank'] = PayoutSetting::where('user_id', $result->host_id)->first();
        $data['date_price'] = json_decode($result->date_with_price);
        $data['details'] = BookingDetails::pluck('value', 'field')->toArray();

        $payouts = Payouts::whereBookingId($request->id)->whereUserType('Host')->first();

        if ($payouts) {
            $data['penalty_amount'] = $payouts->total_penalty_amount;
        }


        return view('admin.bookings.detail', $data);
    }

    public function pay(Request $request)
    {
        $booking_id = $request->booking_id;
        $booking = Bookings::find($booking_id);
        $booking_details = BookingDetails::find($booking_id);

        $data['currency_default'] = Currency::getAll()->where('default', 1)->first();
        $default_currency = $data['currency_default']->code;
        $companyName = Settings::getAll()->where('type', 'general')->where('name', 'name')->first()->value;

        if ($request->user_type == 'guest') {
            $payout_email = $booking->guest_account;
            $amount = $booking->original_guest_payout;
            $payout_user_id = $booking->user_id;
            $payout_id = $request->guest_payout_id;
            $guestPayout = ($companyName . ': ' . 'Your payout amount is' . ' ' . $booking->currency->code . ' ' . $amount);
            twilioSendSms($booking->users->formatted_phone, $guestPayout);
        } elseif ($request->user_type == 'host') {
            $payout_email = $booking->host_account;
            $amount = $booking->original_host_payout;
            $payout_user_id = $booking->host_id;
            $payout_id = $request->host_payout_id;
            $hostPayout = ($companyName . ': ' . 'Your payout amount is' . ' ' . $booking->currency->code . ' ' . $amount);
            twilioSendSms($booking->users->formatted_phone, $hostPayout);
        } else {
            return redirect('admin/bookings/detail/' . $booking_id);
        }

        $payouts = Payouts::find($payout_id);
        $payouts->booking_id = $booking_id;
        $payouts->property_id = $booking->property_id;
        $payouts->amount = $amount;
        $payouts->currency_code = $default_currency;
        $payouts->user_type = $request->user_type;
        $payouts->user_id = $payout_user_id;
        $payouts->account = $payout_email;
        $payouts->status = 'Completed';
        $payouts->save();
        $email = new EmailController;
        $email->payout_sent($booking_id);
        Common::one_time_message('success', ucfirst($request->user_type) . ' payout amount successfully marked as paid');
        return redirect('admin/bookings/detail/' . $booking_id);
    }

    public function needPayAccount(Request $request, EmailController $email)
    {
        $type = $request->type;
        $email->need_pay_account($request->id, $type);

        Common::one_time_message('success', 'Email sent Successfully');
        return redirect('admin/bookings/detail/' . $request->id);
    }

    public function searchProperty(Request $request)
    {
        $str = $request->term;

        if ($str == null) {
            $myresult = Properties::where('status', 'Listed')->select('id', 'name')->take(5)->select('properties.id', 'properties.name AS text')->get();
        } else {
            $myresult = Properties::where('properties.name', 'LIKE', '%' . $str . '%')->select('properties.id', 'properties.name AS text')->get();
        }

        if ($myresult->isEmpty()) {
            $myArr = null;
        } else {
            $arr2 = array(
                "id" => "",
                "text" => "All"
            );
            $myArr[] = ($arr2);
            foreach ($myresult as $result) {
                $arr = array(
                    "id" => $result->id,
                    "text" => $result->text
                );
                $myArr[] = ($arr);
            }
        }
        return $myArr;
    }

    public function searchCustomer(Request $request)
    {
        $str = $request->term;

        if ($str == null) {
            $myresult = User::select('id', 'first_name', 'last_name')->take(5)->get();
        } else {
            $myresult = User::where('users.first_name', 'LIKE', '%' . $str . '%')->orWhere('users.last_name', 'LIKE', '%' . $str . '%')->select('users.id', 'users.first_name', 'users.last_name')->get();
        }

        if ($myresult->isEmpty()) {
            $myArr = null;
        } else {
            $arr2 = array(
                "id" => "",
                "text" => "All"
            );
            $myArr[] = ($arr2);
            foreach ($myresult as $result) {
                $arr = array(
                    "id" => $result->id,
                    "text" => $result->first_name . " " . $result->last_name
                );
                $myArr[] = ($arr);
            }
        }
        return $myArr;
    }

    public function updateBookingStatus(Request $request)
    {
        $booking = Bookings::find($request->id);
        $dates = BankDate::select('date')->where('booking_id', $booking->id)->get()->pluck('date');
        if ($request->req == 'decline') {
            PropertyDates::where('property_id', $booking->property_id)
                ->whereIn('date', $dates)->update(['status' => 'Available']);
            $booking->status = 'Declined';
        } else {
            $booking->status = 'Accepted';
            Payouts::updateOrCreate(
                [
                    'booking_id' => $booking->id,
                    'user_type' => 'host',
                ],
                [
                    'user_id' => $booking->host_id,
                    'property_id' => $booking->property_id,
                    'amount' => $booking->original_host_payout,
                    'currency_code' => $booking->currency_code,
                    'status' => 'Future',
                ]
            );

            $this->addBookingPaymentInHostWallet($booking);
        }
        $booking->save();
        BankDate::where('booking_id', $booking->id)->delete();
        return redirect()->back();
    }

    public function bookingCsv($id = null)
    {
        return Excel::download(new BookingsExport, 'booking_sheet' . time() . '.xls');
    }

    public function bookingPdf($id = null)
    {
        $to = setDateForDb(request()->to);
        $from = setDateForDb(request()->from);
        $status = isset(request()->status) ? request()->status : null;
        $property = isset(request()->property) ? request()->property : null;
        $customer = isset(request()->customer) ? request()->customer : null;
        $id = isset(request()->user_id) ? request()->user_id : null;

        $bookings = $this->getAllBookings();

        if (isset($id)) {
            $bookings->where('bookings.user_id', '=', $id);
        }
        if ($from) {
            $bookings->whereDate('bookings.created_at', '>=', $from);
        }

        if ($to) {
            $bookings->whereDate('bookings.created_at', '<=', $to);
        }
        if ($property) {
            $bookings->where('bookings.property_id', '=', $property);
        }
        if ($customer) {
            $bookings->where('bookings.user_id', '=', $customer);
        }
        if ($status) {
            $bookings->where('bookings.status', '=', $status);
        }
        if ($from && $to) {
            $data['date_range'] = onlyFormat($from) . ' To ' . onlyFormat($to);
        }

        $data['bookingList'] = $bookings->get();

        $pdf = PDF::loadView('admin.bookings.list_pdf', $data, [], [
            'format' => 'A3',
            [750, 1060]
        ]);
        return $pdf->download('booking_list_' . time() . '.pdf', array("Attachment" => 0));
    }

    public function getAllBookings()
    {
        $allBookings = Bookings::join('properties', function ($join) {
            $join->on('properties.id', '=', 'bookings.property_id');
        })
            ->join('users', function ($join) {
                $join->on('users.id', '=', 'bookings.user_id');
            })
            ->join('currency', function ($join) {
                $join->on('currency.code', '=', 'bookings.currency_code');
            })
            ->leftJoin('users as u', function ($join) {
                $join->on('u.id', '=', 'bookings.host_id');
            })
            ->where('bookings.status', '=', 'Accepted')
            ->select(['bookings.id as id', 'u.first_name as host_name', 'users.first_name as guest_name', 'properties.name as property_name', DB::raw('CONCAT(currency.symbol, bookings.total) AS total_amount'), 'bookings.status', 'bookings.created_at as created_at', 'bookings.updated_at as updated_at', 'bookings.start_date', 'bookings.end_date', 'bookings.guest', 'bookings.host_id', 'bookings.user_id', 'bookings.total', 'bookings.currency_code', 'bookings.service_charge', 'bookings.host_fee']);
        return $allBookings;
    }

    public static function getAllBookingsCSV()
    {
        $allBookings = Bookings::join('properties', function ($join) {
            $join->on('properties.id', '=', 'bookings.property_id');
        })
            ->join('users', function ($join) {
                $join->on('users.id', '=', 'bookings.user_id');
            })
            ->join('currency', function ($join) {
                $join->on('currency.code', '=', 'bookings.currency_code');
            })
            ->leftJoin('users as u', function ($join) {
                $join->on('u.id', '=', 'bookings.host_id');
            })
            ->where('bookings.status', '=', 'Accepted')
            ->select(['bookings.id as id', 'u.first_name as host_name', 'users.first_name as guest_name', 'properties.name as property_name', DB::raw('bookings.total AS total_amount'), 'bookings.currency_code as currency_name', 'bookings.status', 'bookings.created_at as created_at', 'bookings.updated_at as updated_at', 'bookings.start_date', 'bookings.end_date', 'bookings.guest', 'bookings.host_id', 'bookings.user_id', 'bookings.total', 'bookings.currency_code', 'bookings.service_charge', 'bookings.host_fee'])
            ->orderBy('bookings.id', 'desc');
        return $allBookings;
    }

    public function addBookingPaymentInHostWallet($booking)
    {
        $walletBalance = Wallet::where('user_id', $booking->host_id)->first();
        $default_code = Currency::getAll()->firstWhere('default', 1)->code;
        $wallet_code = Currency::getAll()->firstWhere('id', $walletBalance->currency_id)->code;
        $balance = ($walletBalance->balance + Common::convert_currency($default_code, $wallet_code, $booking->total) - Common::convert_currency($default_code, $wallet_code, $booking->service_charge) - Common::convert_currency($default_code, $wallet_code, $booking->accomodation_tax) - Common::convert_currency($default_code, $wallet_code, $booking->iva_tax));
        Wallet::where(['user_id' => $booking->host_id])->update(['balance' => $balance]);
    }

    public function searchFormProperty(Request $request)
    {
        $str = $request->term;
        $page = $request->page ?? 1;
        $perPage = 5;

        $query = Properties::with('property_address')
            ->where('status', 'Listed')
            ->select('properties.id', 'properties.name AS text');

        if ($str != null) {
            $query->where(function ($query) use ($str) {
                $query->where('properties.name', 'LIKE', '%' . $str . '%')
                    ->orWhereHas('property_address', function ($query) use ($str) {
                        $query->where(function ($query) use ($str) {
                            $query->where('city', 'LIKE', '%' . $str . '%')
                                ->orWhere('state', 'LIKE', '%' . $str . '%')
                                ->orWhere('country', 'LIKE', '%' . $str . '%')
                                ->orWhere('area', 'LIKE', '%' . $str . '%');
                        });
                    });
            });
        }

        $myresult = $query->paginate($perPage, ['*'], 'page', $page);

        $myArr = [];

        if ($myresult->isEmpty()) {
            $myArr = null;
        } else {
            $arr2 = array(
                "id" => "",
                "text" => "All"
            );
            $myArr[] = $arr2;

            foreach ($myresult as $result) {
                $arr = array(
                    "id" => $result->id,
                    "text" => $result->text,
                    "property_address" => [
                        'address_line_1' => $result->property_address->address_line_1 ?? '',
                        'address_line_2' => $result->property_address->address_line_2 ?? '',
                        'city' => $result->property_address->city ?? '',
                        'state' => $result->property_address->state ?? '',
                        'country' => $result->property_address->country ?? '',
                        'postal_code' => $result->property_address->postal_code ?? '',
                    ],
                );
                $myArr[] = $arr;
            }
        }
        return response()->json([
            'results' => $myArr,
            'pagination' => [
                'more' => $myresult->hasMorePages(),
            ],
        ]);
    }
    public function searchFormCustomer(Request $request)
    {
        $str = $request->term;
        $page = $request->page ?? 1;
        $perPage = 5;


        $query = User::select('id', 'first_name', 'last_name');

        if ($str) {
            $query->where(function ($query) use ($str) {
                $query->where('first_name', 'LIKE', '%' . $str . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $str . '%');
            });
        }

        $myresult = $query->paginate($perPage, ['*'], 'page', $page);

        $myArr = [];

        if ($myresult->isEmpty()) {
            $myArr = null;
        } else {
            $arr2 = [
                "id" => "",
                "text" => "All"
            ];
            $myArr[] = $arr2;

            foreach ($myresult as $result) {
                $arr = [
                    "id" => $result->id,
                    "text" => $result->first_name . " " . $result->last_name
                ];
                $myArr[] = $arr;
            }
        }


        return response()->json([
            'results' => $myArr,
            'pagination' => [
                'more' => $myresult->hasMorePages(),
            ],
        ]);
    }
}
