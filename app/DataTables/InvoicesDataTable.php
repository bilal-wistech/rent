<?php

namespace App\DataTables;

use App\Models\Bookings;
use App\Models\Invoice;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Request;

class InvoicesDataTable extends DataTable
{
    public function ajax()
    {
        $invoices = $this->query();

        return datatables()
            ->of($invoices)
            ->addColumn('reference_no', function ($invoices) {
                return $invoices->reference_no;
            })
            ->addColumn('invoice_date', function ($invoices) {
                return Carbon::parse($invoices->invoice_date)->format('m-d-Y');
            })
            ->addColumn('property_id', function ($invoices) {
                return $invoices->property->name;
            })
            ->addColumn('customer_id', function ($invoices) {
                return $invoices->customer->first_name . ' ' . $invoices->customer->last_name;
            })
            ->addColumn('check_in', function ($invoices) {
                return Carbon::parse($invoices->booking->start_date)->format('m-d-Y');
            })
            ->addColumn('check_out', function ($invoices) {
                return Carbon::parse($invoices->booking->end_date)->format('m-d-Y');
            })
            ->addColumn('created_at', function ($invoices) {
                return dateFormat($invoices->created_at);
            })
            ->addColumn('action', function ($invoices) {
                return '<a href="' . url('admin/bookings/detail/' . $invoices->id) . '" class="btn btn-xs btn-primary" title="Detail View"><i class="fa fa-share"></i></a>&nbsp;' .
                    '<a href="' . url('admin/bookings/edit/' . $invoices->id) . '" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;';

            })
            ->rawColumns(['reference_no', 'property_id', 'customer_id', 'invoice_date', 'action'])
            ->make(true);
    }

    public function query()
    {
        $status = isset(request()->status) ? request()->status : null;
        $from = isset(request()->from) ? setDateForDb(request()->from) : null;
        $to = isset(request()->to) ? setDateForDb(request()->to) : null;
        $property = isset(request()->property) ? request()->property : null;
        $customer = isset(request()->customer) ? request()->customer : null;
        $invoices = Invoice::with('customer', 'property');
        if (!empty($from)) {
            $invoices->whereDate('invoices.created_at', '>=', $from);
        }
        if (!empty($to)) {
            $invoices->whereDate('invoices.created_at', '<=', $to);
        }
        if (!empty($property)) {
            $invoices->where('invoices.property_id', '=', $property);
        }
        if (!empty($customer)) {
            $invoices->where('invoices.user_id', '=', $customer);
        }
        return $this->applyScopes($invoices);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'reference_no', 'name' => 'reference_no', 'title' => 'Reference No'])
            ->addColumn(['data' => 'invoice_date', 'name' => 'invoice_date', 'title' => 'Invoice Date'])
            ->addColumn(['data' => 'property_id', 'name' => 'property_id', 'title' => 'Property Name'])
            ->addColumn(['data' => 'customer_id', 'name' => 'customer_id', 'title' => 'Customer Name'])
            ->addColumn(['data' => 'check_in', 'name' => 'check_in', 'title' => 'Check In Date'])
            ->addColumn(['data' => 'check_out', 'name' => 'check_out', 'title' => 'Check Out Date'])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => true, 'searchable' => false])
            ->parameters(dataTableOptions());
    }


    protected function filename()
    {
        return 'invoicesdatatables_' . time();
    }
}
