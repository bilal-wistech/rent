<?php

namespace App\Http\Controllers;

use Session, DateTime, Common;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\EmailController;
use App\Models\{
    Bank,
    BankDate,
    Payouts,
    Currency,
    Country,
    Settings,
    Payment,
    Photo,
    Withdraw,
    Messages,
    Wallet,
    Properties,
    Bookings,
    PaymentMethods,
    BookingDetails,
    PropertyDates,
    PropertyPrice,
    Invoice
};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Modules\Gateway\Entities\GatewayModule;

class PaymentController extends Controller
{

    public function index(Request $request)
    {
        $data['gateways'] = (new GatewayModule)->payableGateways();

        if ($request->isMethod('post')) {
            Session::put('payment_property_id', $request->id);
            Session::put('payment_checkin', $request->checkin);
            Session::put('payment_checkout', $request->checkout);
            Session::put('payment_number_of_guests', $request->number_of_guests);
            Session::put('payment_booking_type', $request->booking_type);
            Session::put('payment_booking_status', $request->booking_status);
            Session::put('payment_booking_id', $request->booking_id);

            $id               = Session::get('payment_property_id');
            $checkin          = Session::get('payment_checkin');
            $checkout         = Session::get('payment_checkout');
            $number_of_guests = Session::get('payment_number_of_guests');
            $booking_type     = Session::get('payment_booking_type');
            $booking_status   = Session::get('payment_booking_status');
            $booking_id       = Session::get('payment_booking_id');
        } else {
            $id               = Session::get('payment_property_id');
            $number_of_guests = Session::get('payment_number_of_guests');
            $checkin          = Session::get('payment_checkin');
            $checkout         = Session::get('payment_checkout');
            $booking_type     = Session::get('payment_booking_type');
            $booking_status   = Session::get('payment_booking_status');
        }

        if (!$request->isMethod('post') && ! $checkin) {
            return redirect('properties/' . $request->id);
        }

        $data['result']           = Properties::find($id);
        $data['property_id']      = $id;
        $data['number_of_guests'] = $number_of_guests;
        $data['booking_type']     = $booking_type;
        $data['checkin']          = setDateForDb($checkin);
        $data['checkout']         = setDateForDb($checkout);
        $data['status']           = $booking_status ?? "";
        $data['booking_id']       = $booking_id ?? "";

        $from                     = new DateTime(setDateForDb($checkin));
        $to                       = new DateTime(setDateForDb($checkout));
        $data['nights']           = $to->diff($from)->format("%a");

        $data['price_list']    = json_decode(Common::getPrice($data['property_id'], $data['checkin'], $data['checkout'], $data['number_of_guests']));
        Session::put('payment_price_list', $data['price_list']);

        if (((isset($data['price_list']->status) && ! empty($data['price_list']->status)) ? $data['price_list']->status : '') == 'Not available') {
            Common::one_time_message('success', __('Porperty does not available'));
            return redirect('properties/' . $id);
        }

        $data['currencyDefault']  = $currencyDefault = Currency::getAll()->firstWhere('default', 1);

        $data['price_eur']        = numberFormat(Common::convert_currency($data['result']->property_price->code, $currencyDefault->code, $data['price_list']->total), 2);
        $data['price_rate']       = Common::currency_rate($data['result']->property_price->currency_code, Common::getCurrentCurrencycode());
        $data['country']          = Country::getAll()->pluck('name', 'short_name');
        $data['title']            = __('Pay for your reservation');
        $data['currentCurrency'] = Common::getCurrentCurrency();

        return view('payment.payment', $data);
    }


    public function createBooking(Request $request)
    {

        $currencyDefault    = Currency::getAll()->where('default', 1)->first();
        $price_list         = json_decode(Common::getPrice($request->property_id, $request->checkin, $request->checkout, $request->number_of_guests));
        $amount             = round(Common::convert_currency($request->currency, $currencyDefault->code, $price_list->total), 2);

        $country            = $request->payment_country;
        $message_to_host    = $request->message_to_host;


        Session::put('amount', $amount);
        Session::put('payment_method', $request->payment_method);
        Session::put('payment_booking_type', $request->booking_type);
        Session::put('payment_country', $country);
        Session::put('message_to_host_' . Auth::user()->id, $message_to_host);

        Session::save();

        if ($request->payment_method) {
            return redirect(route('gateway.pay', (['gateway' => $request->payment_method])));
        } else {

            $data = [
                'property_id'      => $request->property_id,
                'checkin'          => $request->checkin,
                'checkout'         => $request->checkout,
                'number_of_guests' => $request->number_of_guests,
                'transaction_id'   => '',
                'price_list'       => $price_list,
                'paymode'          => '',
                'payment_alias'    => '',
                'first_name'       => $request->first_name,
                'last_name'        => $request->last_name,
                'postal_code'      => '',
                'country'          => '',
                'message_to_host'  => $message_to_host
            ];

            $msg = explode('||', $this->store($data));
            $code = $msg[0];
            $errorMessage = $msg[1];
            Common::one_time_message('success', __('Your request has been sent.'));
            return redirect('booking/requested?code=' . $code);
        }
    }

    public function getDataForBooking()
    {
        $data['id'] = $id         = Session::get('payment_property_id');
        $data['result']           = Properties::find($id);
        $data['property_id']      = $id;

        $checkin                  = Session::get('payment_checkin');
        $checkout                 = Session::get('payment_checkout');
        $number_of_guests         = Session::get('payment_number_of_guests');
        $booking_type             = Session::get('payment_booking_type');

        $data['checkin']          = setDateForDb($checkin);
        $data['checkout']         = setDateForDb($checkout);
        $data['number_of_guests'] = $number_of_guests;
        $data['booking_type']     = $booking_type;

        $from                     = new DateTime(setDateForDb($checkin));
        $to                       = new DateTime(setDateForDb($checkout));

        $data['nights']           = $to->diff($from)->format("%a");

        $data['price_list']       = json_decode(Common::getPrice($data['property_id'], $data['checkin'], $data['checkout'], $data['number_of_guests']));

        $data['currencyDefault']  = $currencyDefault = Currency::getAll()->where('default', 1)->first();

        $data['price_eur']        = Common::convert_currency($data['result']->property_price->default_code, $currencyDefault->code, $data['price_list']->total);

        $data['price_rate']       = Common::currency_rate($currencyDefault->code, Common::getCurrentCurrencyCode());
        $data['symbol']           = Common::getCurrentCurrencySymbol();
        $data['code']             = Common::getCurrentCurrencyCode();
        $data['title']            = __('Pay for your reservation');
        return $data;
    }

    public function store(Request $request)
    {
        dd($request->all());
        \Log::info('Starting booking store process', ['request_data' => $request->all()]);

        $currencyDefault = Currency::getAll()->where('default', 1)->first();
        $property = Properties::findOrFail($request->property_id);

        DB::beginTransaction();
        try {
            $booking = '';
            $bookingId = $request->booking_id ?? null;
            $status = 'booked not paid';
            $payment_status = 'unpaid';

            \Log::debug('Preparing booking data', [
                'booking_id' => $bookingId,
                'property_id' => $request->property_id,
                'user_id' => Auth::user()->id
            ]);

            $bookingData = [
                'property_id' => $request->property_id,
                'user_id' => Auth::user()->id,
                'host_id' => $request->hosting_id,
                'booking_added_by' => Auth::user()->id,
                'start_date' => setDateForDb($request->checkin),
                'end_date' => setDateForDb($request->checkout),
                'guest' => $request->number_of_guests,
                'total_night' => $request->numberOfDays,
                'service_charge' => Common::convert_currency('', $currencyDefault->code, $request->guest_service_charge ?? 0),
                'host_fee' => Common::convert_currency('', $currencyDefault->code, $request->host_service_charge ?? 0),
                'iva_tax' => Common::convert_currency('', $currencyDefault->code, $request->iva_tax ?? 0),
                'accomodation_tax' => Common::convert_currency('', $currencyDefault->code, $request->accomodation_tax ?? 0),
                'guest_charge' => Common::convert_currency('', $currencyDefault->code, $request->guest_fee ?? 0),
                'security_money' => Common::convert_currency('', $currencyDefault->code, $request->security_fee ?? 0),
                'cleaning_charge' => Common::convert_currency('', $currencyDefault->code, $request->cleaning_fee ?? 0),
                'total' => Common::convert_currency('', $currencyDefault->code, $request->totalPriceWithAll ?? 0),
                'base_price' => Common::convert_currency('', $currencyDefault->code, $request->total_price ?? 0),
                'currency_code' => $currencyDefault->code,
                'booking_type' => $request->booking_type,
                'renewal_type' => $request->renewal_type ?? 'none',
                'status' => 'pending',
                'cancellation' => $property->cancellation,
                'per_night' => Common::convert_currency('', $currencyDefault->code, $request->perDayPrice ?? 0),
                'booking_property_status' => $status,
                'transaction_id' => '',
                'payment_method_id' => '',
                'pricing_type_id' => $request->pricingType,
                'buffer_days' => $request->buffer_days ?? 0
            ];

            $booking = Bookings::create($bookingData);
            \Log::info('Booking created successfully', [
                'booking_id' => $booking->id,
                'property_id' => $booking->property_id
            ]);

            $start_date = date('Y-m-d', strtotime($request->checkin));
            $end_date = date('Y-m-d', strtotime($request->checkout));
            $start_date_timestamp = strtotime($start_date);
            $end_date_timestamp = strtotime($end_date);
            $min_days = ($end_date_timestamp - $start_date_timestamp) / 86400;

            $bookedDates = [];
            for ($i = $start_date_timestamp; $i <= $end_date_timestamp; $i += 86400) {
                $bookedDates[] = date("Y-m-d", $i);
            }

            \Log::debug('Creating property dates', [
                'total_dates' => count($bookedDates),
                'start_date' => $start_date,
                'end_date' => $end_date
            ]);

            foreach ($bookedDates as $date) {
                PropertyDates::create([
                    'property_id' => $request->property_id,
                    'booking_id' => $booking->id,
                    'date' => $date,
                    'price' => ($request->per_day_price) ? $request->per_day_price : '0',
                    'status' => $status,
                    'min_day' => $min_days,
                    'min_stay' => ($request->min_stay) ? '1' : '0',
                ]);
            }

            \Log::info('Property dates created successfully', [
                'booking_id' => $booking->id,
                'dates_count' => count($bookedDates)
            ]);

            Invoice::create([
                'booking_id' => $booking->id,
                'property_id' => $property->id,
                'customer_id' => Auth::user()->id,
                'currency_code' => $currencyDefault->code,
                'created_by' => $request->booking_added_by ?? 1,
                'invoice_date' => Carbon::now(),
                'due_date' => Carbon::now()->addDays(5),
                'description' => 'Booking invoice for ' . $property->name,
                'sub_total' => Common::convert_currency('', $currencyDefault->code, $request->total_price),
                'grand_total' => Common::convert_currency('', $currencyDefault->code, $request->totalPriceWithAll),
                'payment_status' => $payment_status
            ]);

            \Log::info('Invoice created successfully', ['booking_id' => $booking->id]);

            DB::commit();
            \Log::info('Booking transaction committed successfully', ['booking_id' => $booking->id]);

            Common::one_time_message('success', 'Booking ' . ($bookingId ? 'Updated' : 'Added') . ' Successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Booking creation failed', [
                'error_message' => $e->getMessage(),
                'error_line' => $e->getLine(),
                'error_file' => $e->getFile(),
                'booking_id' => $booking->id ?? 'not_created',
                'request_data' => $request->all()
            ]);

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

    public function update($data)
    {
        $code = Common::randomCode(6);
        $booking                    = Bookings::find($data['booking_id']);
        $booking->transaction_id    = $data['transaction_id'] ?? ' ';
        $booking->payment_method_id = $data['payment_method_id'] ?? ' ';
        $booking->code              = $code;
        $booking->attachment        = $data['attachment'] ?? null;
        $booking->bank_id           = $data['bank_id'] ?? null;
        $booking->note              = $data['note'] ?? null;
        $booking->status            = 'Accepted';

        if ($data['payment_alias'] == 'directbanktransfer') {
            $data['paymode']        = 'Bank';
            $booking->status        = 'Processing';
        }

        $booking->save();

        $errorMessage = '';
        try {

            $email_controller = new EmailController;
            $email_controller->booking($booking->id, $data['checkin'], $data['paymode'] == 'Bank');
            $email_controller->booking_user($booking->id, $data['checkin']);

            if ($booking->booking_type == "instant" && $data['paymode'] == 'Bank') {
                $email_controller->bankAdminNotify($booking->id, $data['checkin']);
            }
        } catch (\Exception $e) {
            $errorMessage = __('Email was not sent due to :x', ['x' => __($e->getMessage())]);
        }

        if ($data['paymode'] <> 'Bank') {
            $this->addBookingPaymentInHostWallet($booking);
        }

        $dates = [];
        $propertyCurrencyCode = PropertyPrice::firstWhere('property_id', $data['property_id'])->currency_code;
        foreach ($data['price_list']->date_with_price as $dp) {
            $tmp_date = setDateForDb($dp->date);

            $property_data = [
                'property_id' => $data['property_id'],
                'status'      => 'Not available',
                'price'       => Common::convert_currency($data['price_list']->currency, $propertyCurrencyCode, $dp->original_price),
                'date'        => $tmp_date,
            ];

            PropertyDates::updateOrCreate(['property_id' => $booking->property_id, 'date' => $tmp_date], $property_data);
            if ($data['paymode'] == 'Bank') {
                array_push($dates, ['booking_id' => $booking->id, 'date' => $tmp_date]);
            }

            if ($data['paymode'] == 'Bank' && count($dates) > 0) {
                BankDate::insert($dates);
            }
        }

        Bookings::where([['status', 'Processing'], ['property_id', $booking->property_id], ['start_date', $booking->start_date], ['payment_method_id', '!=', 4]])
            ->orWhere([['status', 'Pending'], ['property_id', $booking->property_id], ['start_date', $booking->start_date], ['payment_method_id', '!=', 4]])
            ->update(['status' => 'Expired']);



        if (!$data['paymode'] == 'Bank') {
            Payouts::updateOrCreate(
                [
                    'booking_id'    => $booking->id,
                    'user_type'     => 'host',
                ],
                [
                    'user_id'       => $booking->host_id,
                    'property_id'   => $booking->property_id,
                    'amount'        => $booking->original_host_payout,
                    'currency_code' => $booking->currency_code,
                    'status'        => 'Future',
                ]
            );
        }

        $message = new Messages;
        $message->property_id    = $data['property_id'];
        $message->booking_id     = $booking->id;
        $message->sender_id      = $booking->user_id;
        $message->receiver_id    = $booking->host_id;
        $message->message        = isset($data['message_to_host']) ? $data['message_to_host'] : '';
        $message->type_id        = 4;
        $message->read           = 0;
        $message->save();

        BookingDetails::where(['id' => $data['booking_id']])->update(['value' => $data['country']]);


        $companyName = Settings::getAll()->where('type', 'general')->where('name', 'name')->first()->value;
        $instantBookingConfirm = __(':x : Your booking is confirmed from :y to :z', ['x' => $companyName, 'y' => $booking->start_date, 'z' => $booking->end_date]);
        $instantBookingPaymentConfirm = __(':x Your payment is completed for :y', ['x' => $companyName, 'y' => $booking?->properties?->name]);

        if ($data['paymode'] == 'Bank') {

            $instantBookingConfirm = __(':x : Your booking is confirmed from :y to :z . Admin will approve the booking very soon', ['x' => $companyName, 'y' => $booking->start_date, 'z' => $booking->end_date]);
            $instantBookingPaymentConfirm = __(':x Your payment is completed for :y . Admin will approve the booking very soon', ['x' => $companyName, 'y' => $booking?->properties?->name]);
        }


        twilioSendSms(Auth::user()->formatted_phone, $instantBookingConfirm);
        twilioSendSms(Auth::user()->formatted_phone, $instantBookingPaymentConfirm);

        Session::forget('payment_property_id');
        Session::forget('payment_checkin');
        Session::forget('payment_checkout');
        Session::forget('payment_number_of_guests');
        Session::forget('payment_booking_type');
        Session::forget('payment_booking_status');
        Session::forget('payment_booking_id');

        clearCache('.calc.property_price');
        return $code . '||' . $errorMessage;
    }

    public function withdraws(Request $request)
    {
        $photos = Photo::where('user_id', \Auth::user()->id)->get();
        $photo_ids = [];
        foreach ($photos as $key => $value) {
            $photo_ids[] = $value->id;
        }
        $payment_sum = Payment::whereIn('photo_id', $photo_ids)->sum('amount');
        $withdraw_sum = Withdraw::where('user_id', Auth::user()->id)->sum('amount');
        $data['total'] = $total = $payment_sum - $withdraw_sum;
        if ($request->isMethod('post')) {
            if ($total >= $request->amount) {
                $withdraw = new Withdraw;
                $withdraw->user_id = Auth::user()->id;
                $withdraw->amount = $request->amount;
                $withdraw->status = 'Pending';
                $withdraw->save();
                $data['success'] = 1;
                $data['message'] = __('Success');
            } else {
                $data['success'] = 0;
                $data['message'] = __('Balance exceed');
            }
            echo json_encode($data);
            exit;
        }

        $data['details'] = Auth::user()->details_key_value();
        $data['results'] = Withdraw::where('user_id', Auth::user()->id)->get();
        return view('payment.withdraws', $data);
    }

    public function addBookingPaymentInHostWallet($booking)
    {
        $walletBalance = Wallet::where('user_id', $booking->host_id)->first();
        $default_code = Currency::getAll()->firstWhere('default', 1)->code;
        $wallet_code = Currency::getAll()->firstWhere('id', $walletBalance->currency_id)->code;
        $balance = ($walletBalance->balance + Common::convert_currency($default_code, $wallet_code, $booking->total) - Common::convert_currency($default_code, $wallet_code, $booking->service_charge) - Common::convert_currency($default_code, $wallet_code, $booking->accomodation_tax) - Common::convert_currency($default_code, $wallet_code, $booking->iva_tax));
        Wallet::where(['user_id' => $booking->host_id])->update(['balance' => $balance]);
    }
}
