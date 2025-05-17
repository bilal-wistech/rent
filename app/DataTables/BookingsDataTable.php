<?php

namespace App\DataTables;

use App\Models\Bookings;
use Yajra\DataTables\Services\DataTable;
use Request;

class BookingsDataTable extends DataTable
{
    public function ajax()
    {
        $bookings = $this->query();

        return datatables()
            ->of($bookings)
            ->addColumn('host_name', function ($bookings) {
                return '<a href="' . url('admin/edit-customer/' . $bookings->host_id) . '">' . ucfirst($bookings->host_name) . '</a>';
            })
            ->addColumn('guest_name', function ($bookings) {
                return '<a href="' . url('admin/edit-customer/' . $bookings->user_id) . '">' . ucfirst($bookings->guest_name) . '</a>';
            })
            ->addColumn('property_name', function ($bookings) {
                return '<a href="' . url('admin/listing/' . $bookings->property_id . '/basics') . '">' . ucfirst($bookings->property_name) . '</a>';
            })
            ->addColumn('location', function ($bookings) {
                $parts = [];

                if (!empty($bookings->flat_no)) {
                    $parts[] = 'Flat '.$bookings->flat_no;
                }

                if (!empty($bookings->building)) {
                    $parts[] = $bookings->building;
                }

                if (!empty($bookings->area)) {
                    $parts[] = $bookings->area;
                }

                if (!empty($bookings->city)) {
                    $parts[] = $bookings->city;
                }

                if (!empty($bookings->country)) {
                    $parts[] = $bookings->country;
                }

                return implode(', ', $parts);
            })
            ->addColumn('start_date', function ($bookings) {
                return setDateForDb($bookings->start_date);
            })
            ->addColumn('end_date', function ($bookings) {
                return setDateForDb($bookings->end_date);
            })

            ->addColumn('status', function ($bookings) {
                $status = $bookings->status;
                return $status;
            })
            ->addColumn('booking_property_status', function ($bookings) {
                $status = $bookings->booking_property_status;
                // dd($status);
                return $status;
            })
            ->addColumn('total_amount', function ($bookings) {
                return moneyFormat($bookings->symbol, $bookings->total_amount);
            })
            ->addColumn('created_at', function ($bookings) {
                return dateFormat($bookings->created_at);
            })
            ->addColumn('action', function ($bookings) {
                $status = $bookings->booking_property_status;

                $actions = '<a href="' . url('admin/bookings/detail/' . $bookings->id) . '" class="btn btn-xs btn-primary" title="Detail View"><i class="fa fa-share"></i></a>&nbsp;' .
                    '<a href="' . url('admin/bookings/edit/' . $bookings->id) . '" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;';

                if ($status !== 'booked paid') {
                    $actions .= '<a href="' . url('admin/payment-receipts/create?booking_id=' . $bookings->id) . '" class="btn btn-xs btn-primary" title="Payment Receipt">Payment Receipt</a>&nbsp;';
                }

                return $actions;
            })
            ->rawColumns(['host_name', 'guest_name', 'start_date', 'end_date', 'total_amount', 'property_name', 'action'])
            ->make(true);
    }

    public function query()
    {
        $user_id = Request::segment(4);
        $status = isset(request()->status) ? request()->status : null;
        $from = isset(request()->from) ? setDateForDb(request()->from) : null;
        $to = isset(request()->to) ? setDateForDb(request()->to) : null;
        $property = isset(request()->property) ? request()->property : null;
        $customer = isset(request()->customer) ? request()->customer : null;
        $booking_property_status = isset(request()->booking_property_status) ? request()->booking_property_status : null;
        $bookings = Bookings::join('properties', function ($join) {
            $join->on('properties.id', '=', 'bookings.property_id');
        })
            ->join('users', function ($join) {
                $join->on('users.id', '=', 'bookings.user_id');
            })
            ->join('currency', function ($join) {
                $join->on('currency.code', '=', 'bookings.currency_code');
            })
            ->join('users as u', function ($join) {
                $join->on('u.id', '=', 'bookings.host_id');
            })
            ->join('property_address as pa', function ($join) {
                $join->on('properties.id', '=', 'pa.property_id');
            })
            ->select([
                'bookings.id as id',
                'u.first_name as host_name',
                'users.first_name as guest_name',
                'bookings.property_id as property_id',
                'properties.name as property_name',
                'bookings.total as total_amount',
                'bookings.payment_method_id',
                'bookings.status',
                'bookings.created_at',
                'bookings.updated_at',
                'bookings.start_date',
                'bookings.end_date',
                'bookings.guest',
                'u.id as host_id',
                'users.id as user_id',
                'bookings.currency_code',
                'currency.symbol',
                'bookings.service_charge',
                'bookings.host_fee',
                'bookings.iva_tax',
                'bookings.accomodation_tax',
                'bookings.booking_property_status as booking_property_status',
                'pa.city as city',
                'pa.state as state',
                'pa.country as country',
                'pa.area as area',
                'pa.building as building',
                'pa.flat_no as flat_no',
            ]);

        if (isset($user_id)) {
            $bookings->where('bookings.user_id', '=', $user_id);
        }
        if (!empty($from)) {
            $bookings->whereDate('bookings.created_at', '>=', $from);
        }
        if (!empty($to)) {
            $bookings->whereDate('bookings.created_at', '<=', $to);
        }
        if (!empty($property)) {
            $bookings->where('bookings.property_id', '=', $property);
        }
        if (!empty($customer)) {
            $bookings->where('bookings.user_id', '=', $customer);
        }
        if (!empty($status)) {
            $bookings->where('bookings.status', '=', $status);
        }
        if (!empty($booking_property_status)) {
            $bookings->where('bookings.booking_property_status', '=', $booking_property_status);
        }
        // dd($bookings->first());
        return $this->applyScopes($bookings);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'bookings.id', 'title' => 'Booking ID', 'visible' => false])
            ->addColumn(['data' => 'host_name', 'name' => 'u.first_name', 'title' => 'Host Name'])
            ->addColumn(['data' => 'guest_name', 'name' => 'users.first_name', 'title' => 'Guest Name'])
            ->addColumn(['data' => 'property_name', 'name' => 'properties.name', 'title' => 'Property Name'])
            ->addColumn(['data' => 'location', 'name' => 'location', 'title' => 'Location'])
            ->addColumn(['data' => 'start_date', 'name' => 'bookings.start_date', 'title' => 'Start Date'])
            ->addColumn(['data' => 'end_date', 'name' => 'bookings.end_date', 'title' => 'End Date'])
            ->addColumn(['data' => 'total_amount', 'name' => 'bookings.total', 'title' => 'Total Amount'])
            ->addColumn(['data' => 'status', 'name' => 'bookings.status', 'title' => 'Booking Status'])
            ->addColumn(['data' => 'booking_property_status', 'name' => 'bookings.booking_property_status', 'title' => 'Booking Payment Status'])
            ->addColumn(['data' => 'created_at', 'name' => 'bookings.created_at', 'title' => 'Created Date'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }


    protected function filename()
    {
        return 'bookingsdatatables_' . time();
    }
}
