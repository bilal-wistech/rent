<?php
namespace App\DataTables;

use App\Models\Withdrawal;
use Yajra\DataTables\Services\DataTable;
use Request;


class PayoutsDataTable extends DataTable
{
    public function ajax()
    {
        $payout = $this->query();

        return datatables()->of($payout)

            ->addColumn('p_method', function ($payout) {
                return $payout->payment_methods?->name;
            })

            ->addColumn('user_id', function ($payout) {
                return ucfirst($payout->user?->first_name ? $payout->user?->first_name : '') . ' ' . ucfirst($payout->user?->last_name ? $payout->user?->last_name : '');
            })

            ->addColumn('created_at', function ($payout) {
                return dateFormat($payout->created_at);
            })

            ->addColumn('subtotal', function ($payout) {
                return $payout->status == 'Success' ? $payout->amount : $payout->subtotal;
            })

            ->addColumn('currency_id', function ($payout) {
                return $payout->currency?->code;
            })

            ->addColumn('payto', function ($payout) {
                $admin = \App\Models\Admin::find($payout->payto); // Fetch admin using the value from the 'payto' column
                return $admin ? $admin->username : 'N/A'; // Return admin's username, or 'N/A' if no admin found
            })


            ->addColumn('action', function ($withDrawal) {
                return '
                <a href="' . url('admin/payouts/edit/'.$withDrawal->id) . '" class="btn btn-xs text-white btn-warning" title="Details">
                    <i class="fa fa-pencil"></i>
                </a>&nbsp;
                <a href="' . url('admin/payouts/details/'.$withDrawal->id) . '" class="btn btn-xs btn-primary" title="Edit">
                    <i class="fa fa-tasks"></i>
                </a>&nbsp;
                <button class="btn btn-xs btn-danger" onclick="confirmDelete(' . $withDrawal->id . ')" data-id="' . $withDrawal->id . '" title="Delete">
                    <i class="fa fa-trash"></i>
                </button>&nbsp;';
            })

            ->rawColumns(['action'])
            ->make(true);
    }

    public function query()
    {
        $status = isset(request()->status) ? request()->status : null;
        $from = isset(request()->from) ? setDateForDb(request()->from) : null;
        $to = isset(request()->to) ? setDateForDb(request()->to) : null;

        $user_id = Request::segment(4);

        $query = Withdrawal::with('user', 'currency', 'payment_methods', 'admin');

        if (isset($user_id)) {
            $query->where('withdrawals.user_id', '=', $user_id);
        }

        if (!empty($from)) {
            $query->whereDate('withdrawals.created_at', '>=', $from);
        }

        if (!empty($to)) {
            $query->whereDate('withdrawals.created_at', '<=', $to);
        }

        if (!empty($status)) {
            $query->where('withdrawals.status', '=', $status);
        }

        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'ID', 'visible' => false])
            ->addColumn(['data' => 'user_id', 'name' => 'user.first_name', 'user.last_name', 'title' => 'User Name'])
            ->addColumn(['data' => 'currency_id', 'name' => 'currency.code', 'title' => 'Currency'])
            ->addColumn(['data' => 'p_method', 'name' => 'payment_methods.name', 'title' => 'Payment Method'])
            // ->addColumn(['data' => 'account_number', 'name' => 'account_number', 'title' => 'Account Number'])
            ->addColumn(['data' => 'email', 'name' => 'user.email', 'title' => 'Email'])
            ->addColumn(['data' => 'amount', 'name' => 'amount', 'title' => 'Amount'])
            ->addColumn(['data' => 'amount_due', 'name' => 'amount_due', 'title' => 'amount_due'])
            ->addColumn(['data' => 'payment', 'name' => 'payment', 'title' => 'payment'])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
            ->addColumn(['data' => 'payto', 'name' => 'admin.username', 'title' => 'Pay To'])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])

            ->parameters(dataTableOptions());
    }

    protected function filename()
    {
        return 'payoutsdatatables_' . time();
    }
}
