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

class SecurityDataTable extends DataTable
{
    public function ajax()
    {
        $currencyDefault = Currency::getAll()->where('default', 1)->first();
        $securities = $this->query();
        return datatables()
            ->of($securities)
            ->addIndexColumn()
            ->addColumn('booking_id', function ($securities) {
                return $securities->id;
            })
            ->addColumn('property_id', function ($securities) {
                return $securities->properties->name;
            })
            ->addColumn('location', function ($securities) {
                $parts = [];

                if (!empty($securities->properties->property_address->flat_no)) {
                    $parts[] = 'Flat '.$securities->properties->property_address->flat_no;
                }

                if (!empty($securities->properties->property_address->building)) {
                    $parts[] = $securities->properties->property_address->building;
                }

                if (!empty($securities->properties->property_address->area)) {
                    $parts[] = $securities->properties->property_address->area;
                }

                if (!empty($securities->properties->property_address->city)) {
                    $parts[] = $securities->properties->property_address->city;
                }

                if (!empty($securities->properties->property_address->country)) {
                    $parts[] = $securities->properties->property_address->country;
                }

                return implode(', ', $parts);
            })
            ->addColumn('user_id', function ($securities) {
                return $securities->users->first_name . ' ' . $securities->users->last_name;
            })
            ->addColumn('security_money', function ($securities) use ($currencyDefault) {

                return $currencyDefault->code . ' ' . Common::convert_currency(
                    '',
                    $currencyDefault->code,
                    $securities->security_money ?? 0
                );
            })
            ->addColumn('is_expired', function ($securities) {
                if ($securities->is_expired == 1) {
                    return '<span class="badge bg-danger">Expired</span>';
                } else {
                    return '<span class="badge bg-success">Not Expired Yet</span>';
                }
            })
            ->addColumn('created_at', function ($securities) {
                return dateFormat($securities->created_at);
            })
            ->addColumn('action', function ($securities) {
                if ($securities->is_expired == 1) {
                    return '<a href="' . url('admin/securities/refund-form/' . $securities->id) . '" class="btn btn-xs btn-primary" title="Refund">Refund</a>&nbsp;' .
                        '<button type="button" class="btn btn-xs btn-primary authorize_for_refund" title="Authorized for Refund" id="authorize_for_refund-' . $securities->id . '" data-authorized_for_refund="' . $securities->id . '">Authorized for Refund</button>';
                }
                // return '<button type="button" class="btn btn-xs btn-primary" title="Authorized for Refund" id="authorize_for_refund-' . $securities->id . '" data-authorized_for_refund="' . $securities->id . '">Authorized for Refund</button>';
            })
            ->rawColumns(['DT_RowIndex', 'booking_id', 'property_id', 'user_id', 'security_money', 'is_expired', 'created', 'action'])
            ->make(true);
    }

    public function query()
    {
        $status = isset(request()->status) ? request()->status : null;
        $from = isset(request()->from) ? setDateForDb(request()->from) : null;
        $to = isset(request()->to) ? setDateForDb(request()->to) : null;
        $securities = Bookings::with(['properties.property_address', 'users'])->where('security_money', '>', 0)->where('is_security_refunded', 0);

        if (!empty($from)) {
            $securities->whereDate('securities.created_at', '>=', $from);
        }
        if (!empty($to)) {
            $securities->whereDate('securities.created_at', '<=', $to);
        }
        return $this->applyScopes($securities);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => '#', 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'booking_id', 'name' => 'booking_id', 'title' => 'Booking ID', 'orderable' => true, 'searchable' => false])
            ->addColumn(['data' => 'property_id', 'name' => 'property_id', 'title' => 'Property', 'orderable' => true, 'searchable' => true])
            ->addColumn(['data' => 'location', 'name' => 'location', 'title' => 'Location', 'orderable' => true, 'searchable' => true])
            ->addColumn(['data' => 'user_id', 'name' => 'user_id', 'title' => 'Tenant', 'orderable' => true, 'searchable' => true])
            ->addColumn(['data' => 'security_money', 'name' => 'security_money', 'title' => 'Security Amount', 'orderable' => true, 'searchable' => true])
            ->addColumn(['data' => 'is_expired', 'name' => 'is_expired', 'title' => 'Expired', 'orderable' => true, 'searchable' => true])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }


    protected function filename()
    {
        return 'securitiesdatatables_' . time();
    }
}
