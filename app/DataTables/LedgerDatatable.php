<?php


namespace App\DataTables;

use App\Models\Invoice; // Import the Invoice model
use Yajra\DataTables\Services\DataTable;
use Request;

class LedgerDatatable extends DataTable
{
    public function ajax()
    {
        $invoices = $this->query();

        return datatables()->of($invoices)
            ->addColumn('user_id', function ($invoice) {
                return ucfirst($invoice->user?->first_name ? $invoice->user?->first_name : '') . ' ' . ucfirst($invoice->user?->last_name ? $invoice->user?->last_name : '');
            })
            ->addColumn('invoices_amount', function ($invoice) {
                return number_format($invoice->grand_total, 2); // Show formatted grand total of the invoice
            })
            ->addColumn('total_payments', function ($invoice) {
                return number_format($invoice->total_payments, 2); // Format the payment total
            })
            ->addColumn('balance', function ($invoice) {
                return number_format($invoice->balance, 2); // Format the balance
            })
            ->addColumn('created_at', function ($invoice) {
                return $invoice->created_at ? $invoice->created_at->format('Y-m-d') : 'N/A';
            })
            ->addColumn('action', function ($invoice) {
                return '
                <a href="' . url('admin/balance/details/' . $invoice->customer_id) . '" class="btn btn-xs btn-primary" title="View">
                    <i class="fa fa-eye"></i>
                </a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function query()
    {
        // Query the invoices and sum grand_total, and sum of payments from withdrawals, grouped by customer_id
        $query = Invoice::with('user')
            ->leftJoin('withdrawals', 'withdrawals.user_id', '=', 'invoices.customer_id') // Join with the withdrawals table on user_id to customer_id
            ->select(
                'invoices.customer_id', // Select customer_id from invoices
                \DB::raw('SUM(invoices.grand_total) as grand_total'), // Sum of invoices
                \DB::raw('SUM(withdrawals.payment) as total_payments'), // Sum of payments from withdrawals
                \DB::raw('(SUM(invoices.grand_total) - SUM(withdrawals.payment)) as balance') // Calculate the balance
            )
            ->groupBy('invoices.customer_id'); // Group by customer_id of invoices

        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'user_id', 'name' => 'user.first_name', 'title' => 'User Name'])
            ->addColumn(['data' => 'grand_total', 'name' => 'grand_total', 'title' => 'Invoices Amount'])
            ->addColumn(['data' => 'total_payments', 'name' => 'total_payments', 'title' => 'Total Payments']) // Add this line
            ->addColumn(['data' => 'balance', 'name' => 'balance', 'title' => 'Balance']) // Add the balance column
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }

    protected function filename()
    {
        return 'Invoices_' . time();
    }
}
