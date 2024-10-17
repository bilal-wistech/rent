<?php

namespace App\DataTables;

use App\Models\Invoice; // Import the Invoice model
use Yajra\DataTables\Services\DataTable;
use App\Models\User;
use App\Models\Withdrawal;

class LedgerDatatable extends DataTable
{
    public function ajax()
    {
        $invoices = $this->query();

        return datatables()->of($invoices)
            ->addColumn('user_id', function ($invoice) {
                return ucfirst($invoice->first_name ? $invoice->first_name : '') . ' ' . ucfirst($invoice->last_name ? $invoice->last_name : '');
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
            ->addColumn('action', function ($invoice) {
                return '
                <a href="' . url('admin/balance/details/' . $invoice->invoice_customer_id) . '" class="btn btn-xs btn-primary" title="View">
                    <i class="fa fa-eye"></i>
                </a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function query()
    {
        $query = Invoice::with('user') // Eager load the user relationship
            ->selectRaw('
                invoices.id AS invoice_id, 
                invoices.customer_id AS invoice_customer_id, 
                invoices.grand_total, 
                SUM(withdrawals.payment) AS total_payments, 
                (SUM(withdrawals.payment) - invoices.grand_total) AS balance,
                users.first_name, 
                users.last_name 
            ')
            ->leftJoin('withdrawals', 'invoices.customer_id', '=', 'withdrawals.user_id') // Join with the withdrawals table
            ->leftJoin('users', 'invoices.customer_id', '=', 'users.id') // Join with the users table to get user names
            ->groupBy('invoices.id', 'invoices.customer_id', 'invoices.grand_total', 'users.first_name', 'users.last_name') // Group by necessary fields
            ->havingRaw('SUM(withdrawals.payment) IS NOT NULL'); // Ensure we only get users with payments

        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'user_id', 'name' => 'users.first_name', 'title' => 'User Name'])
            ->addColumn(['data' => 'invoices_amount', 'name' => 'grand_total', 'title' => 'Invoices Amount']) // Changed 'grand_total' to 'invoices_amount'
            ->addColumn(['data' => 'total_payments', 'name' => 'total_payments', 'title' => 'Total Payments'])
            ->addColumn(['data' => 'balance', 'name' => 'balance', 'title' => 'Balance'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }

    protected function filename()
    {
        return 'Invoices_' . time();
    }
}
