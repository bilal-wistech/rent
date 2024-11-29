<?php

namespace App\DataTables;

use Request;
use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\Bookings;
use App\Models\Currency;
use App\Http\Helpers\Common;
use App\Models\PropertyDates;
use App\Models\PaymentReceipt;
use Yajra\DataTables\Services\DataTable;

class PaymentReceiptDataTable extends DataTable
{
    public function ajax()
    {
        $currencyDefault = Currency::getAll()->where('default', 1)->first();
        $payment_receipts = $this->query();
        return datatables()
            ->of($payment_receipts)
            ->addIndexColumn()
            ->addColumn('booking_id', function ($payment_receipts) {
                return $payment_receipts->booking_id;
            })
            ->addColumn('property_id', function ($payment_receipts) {
                return $payment_receipts->booking->properties->name;
            })
            ->addColumn('user_id', function ($payment_receipts) {
                return $payment_receipts->booking->users->first_name . ' ' . $payment_receipts->booking->users->last_name;
            })
            ->addColumn('payment_date', function ($payment_receipts) {
                return Carbon::parse($payment_receipts->payment_date)->format('m-d-Y');
            })
            ->addColumn('amount', function ($payment_receipt) use ($currencyDefault) {

                return $currencyDefault->code . ' ' . Common::convert_currency(
                    '',
                    $currencyDefault->code,
                    $payment_receipt->amount ?? 0
                );
            })
            ->addColumn('total_amount', function ($payment_receipt) use ($currencyDefault) {

                return $currencyDefault->code . ' ' . Common::convert_currency(
                    '',
                    $currencyDefault->code,
                    $payment_receipt->booking->total ?? 0
                );
            })
            ->addColumn('status', function ($payment_receipts) {
                // Fetch the status for the specific date range
                $property_id = $payment_receipts->booking->property_id;
                $start_date = $payment_receipts->booking->start_date;
                $end_date = $payment_receipts->booking->end_date;

                $property_dates = PropertyDates::where('property_id', $property_id)
                    ->whereBetween('date', [$start_date, $end_date])
                    ->first(); // Get the first matching record

                return $property_dates ? $property_dates->status : 'N/A';
            })
            ->addColumn('created_at', function ($payment_receipts) {
                return dateFormat($payment_receipts->created_at);
            })
            ->addColumn('action', function ($payment_receipts) {
                return '<a href="' . url('admin/payment-receipts/edit/' . $payment_receipts->id) . '" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-edit"></i></a>';
            })
            ->rawColumns(['DT_RowIndex', 'booking_id', 'property_id', 'user_id', 'payment_date', 'amount', 'total_amount', 'status', 'created','action'])
            ->make(true);
    }

    public function query()
    {
        $status = isset(request()->status) ? request()->status : null;
        $from = isset(request()->from) ? setDateForDb(request()->from) : null;
        $to = isset(request()->to) ? setDateForDb(request()->to) : null;
        $payment_receipts = PaymentReceipt::with(['booking.properties', 'booking.users']);

        if (!empty($from)) {
            $payment_receipts->whereDate('payment_receipts.created_at', '>=', $from);
        }
        if (!empty($to)) {
            $payment_receipts->whereDate('payment_receipts.created_at', '<=', $to);
        }
        return $this->applyScopes($payment_receipts);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => '#', 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'booking_id', 'name' => 'booking_id', 'title' => 'Booking ID', 'orderable' => true, 'searchable' => false])
            ->addColumn(['data' => 'property_id', 'name' => 'property_id', 'title' => 'Property', 'orderable' => true, 'searchable' => true])
            ->addColumn(['data' => 'user_id', 'name' => 'user_id', 'title' => 'Tenant', 'orderable' => true, 'searchable' => true])
            ->addColumn(['data' => 'paid_through', 'name' => 'paid_through', 'title' => 'Paid Through', 'orderable' => true, 'searchable' => true])
            ->addColumn(['data' => 'payment_date', 'name' => 'payment_date', 'title' => 'Payment Date', 'orderable' => true, 'searchable' => true])
            ->addColumn(['data' => 'amount', 'name' => 'amount', 'title' => 'Amount Paid', 'orderable' => true, 'searchable' => false])
            ->addColumn(['data' => 'total_amount', 'name' => 'total_amount', 'title' => 'Total Amount', 'orderable' => true, 'searchable' => false])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Payment Status', 'orderable' => true, 'searchable' => true])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At', 'orderable' => true, 'searchable' => true])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }


    protected function filename()
    {
        return 'paymentreceiptdatatables_' . time();
    }
}
