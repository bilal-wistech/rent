<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Bookings;
use App\Models\Properties;
use Illuminate\Http\Request;
use App\Models\PropertyDates;
use App\Models\PaymentReceipt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DataTables\PaymentReceiptDataTable;
use App\Http\Requests\AddPaymentReceiptRequest;
use App\Http\Requests\UpdatePaymentReceiptRequest;

class PaymentReceiptController extends Controller
{
    public function index(PaymentReceiptDataTable $dataTable)
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
            return $dataTable->render('admin.payment-receipts.index', $data);
        }
        isset(request()->property) ? $data['allproperties'] = request()->property : $data['allproperties'] = '';
        isset(request()->customer) ? $data['allcustomers'] = request()->customer : $data['allcustomers'] = '';
        isset(request()->status) ? $data['allstatus'] = request()->status : $data['allstatus'] = '';
        return $dataTable->render('admin.payment-receipts.index', $data);
    }
    public function create()
    {
        $payment_receipts = Bookings::whereIn('booking_property_status', ['booked not paid', 'booked but not fully paid'])->get();
        // dd($payment_receipts);
        return view('admin.payment-receipts.create', compact('payment_receipts'));
    }
    public function getBookingDetails($booking_id)
    {
        $booking = Bookings::with('paymentReceipts')->where('id', $booking_id)->firstOrFail();

        // Calculate the total amount for this booking's payment receipts
        $totalAmount = $booking->paymentReceipts->sum('amount');
        return response()->json([
            'booking' => $booking,
            'totalBookingAmount' => $booking->total,
            'totalAmount' => $totalAmount
        ]);
    }

    public function store(AddPaymentReceiptRequest $request)
    {
        // dd($request);
        DB::beginTransaction();

        try {
            $booking = Bookings::findOrFail($request->booking_id);
            // Find the invoice for the booking
            $invoice = Invoice::where('booking_id', $booking->id)->firstOrFail();

            // Add invoice_id to the request data
            $request->merge(['invoice_id' => $invoice->id]);

            // Create the payment receipt
            $payment_receipt = PaymentReceipt::create($request->all());

            if ($payment_receipt) {
                if ($request->amount < $request->remaining_amount) {
                    // Partial payment logic
                    PropertyDates::where('booking_id', $booking->id)
                        ->where('property_id', $booking->property_id)
                        ->update(['status' => 'booked but not fully paid']);

                    Bookings::where('id', $booking->id)
                        ->update(['booking_property_status' => 'booked but not fully paid']);

                    Invoice::where('id', $invoice->id)
                        ->where('booking_id', $booking->id)
                        ->update(['payment_status' => 'partial paid']); // Corrected syntax
                } elseif ($request->amount == $request->remaining_amount) {
                    // Fully paid logic
                    PropertyDates::where('booking_id', $booking->id)
                        ->where('property_id', $booking->property_id)
                        ->update(['status' => 'booked paid']);

                    Bookings::where('id', $booking->id)
                        ->update(['booking_property_status' => 'booked paid']);

                    Invoice::where('id', $invoice->id)
                        ->where('booking_id', $booking->id)
                        ->update(['payment_status' => 'paid']); // Corrected syntax
                }
            }

            // Commit the transaction
            DB::commit();

            return redirect()->route('payment-receipts.index')->with('success', 'Payment receipt created successfully.');
        } catch (Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Log the exception for debugging
            Log::error('Error adding payment receipt: ' . $e->getMessage());

            // Return error response
            return redirect()->back()->with('error', 'An error occurred while adding the payment receipt. Please try again.');
        }
    }


    public function edit(PaymentReceipt $payment_receipt)
    {
        $property_id = $payment_receipt->booking->property_id;
        $start_date = $payment_receipt->booking->start_date;
        $end_date = $payment_receipt->booking->end_date;

        $property_status = PropertyDates::where('property_id', $property_id)
            ->whereBetween('date', [$start_date, $end_date])
            ->first();
        return view('admin.payment-receipts.edit', compact('payment_receipt', 'property_status'));
    }

    public function update(UpdatePaymentReceiptRequest $request, PaymentReceipt $payment_receipt)
    {

        $booking = $payment_receipt->booking;
        if ($booking->total == $payment_receipt->amount) {
            return redirect()->back()
                ->with('error', 'This booking is already fully paid. No further payments can be added.');
        }

        $payment_receipt->update([
            'paid_through' => $request->paid_through,
            'payment_date' => $request->payment_date,
            'amount' => $request->amount
        ]);
        if ($request->amount < $booking->total) {
            // Partial payment
            PropertyDates::where('booking_id', $booking->id)
                ->where('property_id', $booking->property_id)
                ->update(['status' => 'booked but not fully paid']);
            Bookings::where('id', $booking->id)
                ->update(['booking_property_status' => 'booked but not fully paid']);
        } elseif ($request->amount == $booking->total) {
            // Fully paid
            PropertyDates::where('booking_id', $booking->id)
                ->where('property_id', $booking->property_id)
                ->update(['status' => 'booked paid']);
            Bookings::where('id', $booking->id)
                ->update(['booking_property_status' => 'booked paid']);
        }

        return redirect()->route('payment-receipts.index')
            ->with('success', 'New payment receipt created');
    }
}
