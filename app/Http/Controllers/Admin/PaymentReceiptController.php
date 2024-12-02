<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PaymentReceiptDataTable;
use App\Models\PaymentReceipt;
use App\Models\PropertyDates;
use App\Models\User;
use App\Models\Properties;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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

    public function edit(PaymentReceipt $payment_receipt)
    {
        return view('admin.payment-receipts.edit', compact('payment_receipt'));
    }

    public function update(Request $request, PaymentReceipt $payment_receipt)
    {
        $booking = $payment_receipt->booking;

        // Create the payment receipt
        PaymentReceipt::create([
            'booking_id' => $booking->id,
            'paid_through' => $request->paid_through,
            'payment_date' => $request->payment_date,
            'amount' => $request->amount
        ]);
        if ($request->amount < $booking->total) {
            // Partial payment
            PropertyDates::where('booking_id', $booking->id)
                ->where('property_id', $booking->property_id)
                ->update(['status' => 'booked but not fully paid']);
        } elseif ($request->amount == $booking->total) {

            PropertyDates::where('booking_id', $booking->id)
                ->where('property_id', $booking->property_id)
                ->update(['status' => 'booked paid']);
        }

        return redirect()->route('payment-receipts.index')
            ->with('success', 'New payment receipt created');
    }
}
