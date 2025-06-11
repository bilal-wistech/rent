<?php

namespace App\DataTables;

use App\Models\Service;
use Yajra\DataTables\Services\DataTable;

class ServicesDataTable extends DataTable
{
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('service', function ($service) {
                return $service->sectionContent->name ?? '-';
            })
            ->editColumn('preferred_date', function ($service) {
                return $service->preferred_date
                    ? \Carbon\Carbon::parse($service->preferred_date)->format('d M Y')
                    : '-';
            })
            ->editColumn('preferred_time', function ($service) {
                return $service->preferred_time
                    ? \Carbon\Carbon::parse($service->preferred_time)->format('h:i A')
                    : '-';
            })
            ->editColumn('created_at', function ($service) {
                return $service->created_at->format('d M Y, h:i A');
            })
            ->addColumn('action', function ($service) {
                $view = '<a href="' . url('admin/services/' . $service->id) . '" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>';
                return $view;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function query()
    {
        return $this->applyScopes(
            Service::with('sectionContent')
        );
    }


    public function html()
    {
        return $this->builder()
            ->setTableId('services-table')
            ->addColumn(['data' => 'service', 'name' => 'service', 'title' => 'Service', 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'full_name', 'name' => 'full_name', 'title' => 'Full Name'])
            ->addColumn(['data' => 'phone', 'name' => 'phone', 'title' => 'Phone'])
            ->addColumn(['data' => 'no_of_guests', 'name' => 'no_of_guests', 'title' => 'Guests'])
            ->addColumn(['data' => 'preferred_date', 'name' => 'preferred_date', 'title' => 'Preferred Date'])
            ->addColumn(['data' => 'preferred_time', 'name' => 'preferred_time', 'title' => 'Preferred Time'])
            ->addColumn(['data' => 'notes', 'name' => 'notes', 'title' => 'Notes'])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Submitted At'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }


    protected function filename()
    {
        return 'services_' . date('YmdHis');
    }
}
