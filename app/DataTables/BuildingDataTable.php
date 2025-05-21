<?php

namespace App\DataTables;

use App\Models\Building;
use Yajra\DataTables\Services\DataTable;

class BuildingDataTable extends DataTable
{
    public $areaId;

    // Accept areaId optionally
    public function __construct($areaId = null)
    {
        $this->areaId = $areaId;
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($building) {
                $edit = '<a href="' . route('building.edit', $building->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>&nbsp;';
                $delete = '
                <form action="' . route('building.destroy', $building->id) . '" method="POST" style="display:inline;">
                    ' . csrf_field() . '
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-xs btn-danger delete-warning">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>';
                return $edit . $delete;
            })
            ->editColumn('city_id', function ($building) {
                return $building->city->name ?? 'N/A';
            })
            ->editColumn('country_id', function ($building) {
                return $building->country->name ?? 'N/A';
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Building $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Building $model)
    {
        $query = $model->newQuery()->with(['city', 'country']);

        if ($this->areaId) {
            $query->where('area_id', $this->areaId);
        }

        return $query;
    }


    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('building-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->parameters(dataTableOptions());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => 'ID'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
            ['data' => 'city_id', 'name' => 'city.name', 'title' => 'City'],
            ['data' => 'country_id', 'name' => 'country.name', 'title' => 'Country'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false],
        ];
    }


    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Building_' . date('YmdHis');
    }
}
