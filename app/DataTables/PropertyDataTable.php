<?php

namespace App\DataTables;

use App\Models\Properties;
use Yajra\DataTables\Services\DataTable;
use Request, Common;

class PropertyDataTable extends DataTable
{
    public function ajax()
    {
        $properties = $this->query();

        return datatables()
            ->of($properties)
            ->addColumn('action', function ($properties) {
                $edit = $delete = $pricing = $status = '';
                if (Common::has_permission(\Auth::guard('admin')->user()->id, 'edit_properties')) {
                    $edit = '<a href="' . url('admin/listing/' . $properties->id) . '/basics" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>&nbsp;';
                }
                if (Common::has_permission(\Auth::guard('admin')->user()->id, 'delete_property')) {
                    $delete = '<a href="' . url('admin/delete-property/' . $properties->id) . '" class="btn btn-xs btn-info delete-warning"><i class="fa fa-trash"></i></a>';
                }
                $pricing = '<a href="' . url('admin/show-pricing/' . $properties->id) . '" class="btn btn-xs btn-secondary "><i class="fa fa-dollar"></i></a>';
                if ($properties->status === 'Listed') {
                    $icon = 'fa-arrow-up';
                    $btnClass = 'btn-success';
                } else {
                    $icon = 'fa-arrow-down';
                    $btnClass = 'btn-danger';
                }

                $status = '<a href="#"
             class="btn btn-xs ' . $btnClass . ' toggle-status"
             data-property-id="' . $properties->id . '"
             data-toggle="tooltip"
             title="' . ($properties->status === 'Listed' ? 'Unlist Property' : 'List Property') . '">
             <i class="fa ' . $icon . '"></i>
           </a>';
                return $edit . $delete . $pricing . $status;
            })
            ->addColumn('id', function ($properties) {
                return $properties->id;
            })
            ->addColumn('host_name', function ($properties) {
                return '<a href="' . url('admin/edit-customer/' . optional($properties->users)->id) . '">' . ucfirst(optional($properties->users)->first_name) . '</a>';
            })
            ->addColumn('name', function ($properties) {
                return '<a href="' . url('admin/listing/' . $properties->id . '/basics') . '">' . ucfirst($properties->name) . '</a>';
            })
            ->addColumn('location', function ($properties) {
                $address = $properties->property_address;

                $parts = [];

                if (!empty($address->flat_no)) {
                    $parts[] = 'Flat '.$address->flat_no;
                }

                if (!empty($address->building)) {
                    $parts[] = $address->building;
                }

                if (!empty($address->area)) {
                    $parts[] = $address->area;
                }

                if (!empty($address->city)) {
                    $parts[] = $address->city;
                }

                if (!empty($address->country)) {
                    $parts[] = $address->country;
                }

                return ucfirst(implode(', ', $parts));
            })

            ->addColumn('created_at', function ($properties) {
                return dateFormat($properties->created_at);
            })
            ->addColumn('recomended', function ($properties) {

                if ($properties->recomended == 1) {
                    return 'Yes';
                }
                return 'No';
            })
            ->addColumn('verified', function ($properties) {

                return ($properties->is_verified == 'Approved' || $properties->is_verified == '') ? 'Approved' : 'Pending';
            })
            ->rawColumns(['host_name', 'name', 'action'])
            ->make(true);
    }

    public function query()
    {
        $user_id    = Request::segment(4);
        $status     = isset(request()->status) ? request()->status : null;
        $from = isset(request()->from) ? setDateForDb(request()->from) : null;
        $to = isset(request()->to) ? setDateForDb(request()->to) : null;
        $property_type = isset(request()->property_type) ? request()->property_type : null;

        $query = Properties::with(['users:id,first_name,profile_image', 'property_address']);
        if (isset($user_id)) {
            $query->where('host_id', '=', $user_id);
        }


        if ($from) {
            $query->whereDate('created_at', '>=', $from);
        }
        if ($to) {
            $query->whereDate('created_at', '<=', $to);
        }
        if ($status) {
            $query->where('status', '=', $status);
        }
        if ($property_type) {
            $query->where('property_type', '=', $property_type);
        }
        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'properties.id', 'title' => 'Id'])
            ->addColumn(['data' => 'name', 'name' => 'properties.name', 'title' => 'Name'])
            ->addColumn(['data' => 'location', 'name' => 'location', 'Location'])
            ->addColumn(['data' => 'host_name', 'name' => 'users.first_name', 'title' => 'Host Name'])
            ->addColumn(['data' => 'property_type_name', 'name' => 'property_type', 'title' => 'Property Type'])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
            ->addColumn(['data' => 'recomended', 'name' => 'recomended', 'title' => 'Recomended'])
            ->addColumn(['data' => 'verified', 'name' => 'verified', 'title' => 'Verified'])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Date'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }


    protected function filename()
    {
        return 'propertydatatables_' . time();
    }
}
