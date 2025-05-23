<?php

// app/DataTables/PricingTypeDataTable.php

namespace App\DataTables;

use App\Models\PricingType;
use Yajra\DataTables\Services\DataTable;

class PricingTypeDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('status', function ($pricingType) {
                return $pricingType->status
                    ? '<span style="color: green; font-weight: bold;">Active</span>'
                    : '<span style="color: red; font-weight: bold;">Inactive</span>';
            })
            ->addColumn('action', function ($pricingType) {
                $editUrl = route('pricing-type.edit', $pricingType->id);
                $deleteUrl = route('pricing-type.destroy', $pricingType->id);

                return '
                <a href="' . $editUrl . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                <form action="' . $deleteUrl . '" method="POST" style="display:inline;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure?\')">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            ';
            })

            ->rawColumns(['status', 'action']);
    }

    public function query()
    {
        return PricingType::query();
    }

    public function html()
    {
        return $this->builder()
            ->columns([
                ['data' => 'id', 'title' => 'ID'],
                ['data' => 'name', 'title' => 'Name'],
                ['data' => 'days', 'title' => 'Days'],
                ['data' => 'status', 'title' => 'Status'],
                ['data' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false],
            ])
            ->parameters(dataTableOptions());
    }

    protected function filename()
    {
        return 'PricingTypes_' . date('YmdHis');
    }
}
