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

class RenewalBookingDataTable extends DataTable
{
    public function ajax()
    {
        $currencyDefault = Currency::getAll()->where('default', 1)->first();
        $renewal_bookings = $this->query();
        return datatables()
            ->of($renewal_bookings)
            ->addIndexColumn()
            ->addColumn('booking_id', function ($renewal_bookings) {
                return $renewal_bookings->id;
            })
            ->addColumn('property_id', function ($renewal_bookings) {
                return $renewal_bookings->properties->name;
            })
            ->addColumn('user_id', function ($renewal_bookings) {
                return $renewal_bookings->users->first_name . ' ' . $renewal_bookings->users->last_name;
            })
            ->addColumn('created_at', function ($renewal_bookings) {
                return dateFormat($renewal_bookings->created_at);
            })
            ->addColumn('action', function ($renewal_bookings) {
                return '<a href="' . url('admin/renewal-bookings/renewal/' . $renewal_bookings->id) . '" class="btn btn-xs btn-primary" title="Renew Booking">Renew</a>&nbsp;' . '<button type="button" class="btn btn-xs btn-primary cancel_renewal_booking" title="Cancel Renewal Booking" id="cancel_renewal_booking-' . $renewal_bookings->id . '" data-cancel-renewal-booking="' . $renewal_bookings->id . '">Cancel</button>';
            })
            ->rawColumns(['DT_RowIndex', 'booking_id', 'property_id', 'user_id', 'payment_date', 'amount', 'total_amount', 'status', 'created', 'action'])
            ->make(true);
    }

    public function query()
    {
        $status = isset(request()->status) ? request()->status : null;
        $from = isset(request()->from) ? setDateForDb(request()->from) : null;
        $to = isset(request()->to) ? setDateForDb(request()->to) : null;
        $renewal_bookings = Bookings::with(['properties', 'users'])->where('renewal_type', 'yes')
            ->where('is_booking_renewed', 0);

        if (!empty($from)) {
            $renewal_bookings->whereDate('renewal_bookings.created_at', '>=', $from);
        }
        if (!empty($to)) {
            $renewal_bookings->whereDate('renewal_bookings.created_at', '<=', $to);
        }
        return $this->applyScopes($renewal_bookings);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => '#', 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'booking_id', 'name' => 'booking_id', 'title' => 'Booking ID', 'orderable' => true, 'searchable' => false])
            ->addColumn(['data' => 'property_id', 'name' => 'property_id', 'title' => 'Property', 'orderable' => true, 'searchable' => true])
            ->addColumn(['data' => 'user_id', 'name' => 'user_id', 'title' => 'Tenant', 'orderable' => true, 'searchable' => true])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At', 'orderable' => true, 'searchable' => true])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }


    protected function filename()
    {
        return 'renewalbookingdatatables_' . time();
    }
}
