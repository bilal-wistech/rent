<?php

/**
 * AmenityTypeDataTable Data Table
 *
 * AmenityTypeDataTable Data Table handles AmenityTypeDataTable datas.
 *
 * @category   AmenityTypeDataTable
 * @package    vRent
 * @author     Techvillage Dev Team
 * @copyright  2020 Techvillage
 * @license
 * @version    2.7
 * @link       http://techvill.net
 * @since      Version 1.3
 * @deprecated None
 */

namespace App\DataTables;

use App\Models\AlertType;
use Yajra\DataTables\Services\DataTable;

class AlertTypeDataTable extends DataTable
{
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('action', function ($alertType) {
                $edit = '<a href="' . route('alert-types.edit', $alertType->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>&nbsp;';
                $delete = '<form action="' . route('alert-types.destroy', $alertType->id) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure you want to delete this alert type?\');">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                        </form>';

                return $edit . ' ' . $delete;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function query()
    {
        $query = AlertType::select();

        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'name', 'name' => 'alert_types.name', 'title' => 'Name'])
            ->addColumn(['data' => 'status', 'name' => 'alert_types.status', 'title' => 'Status'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }

    protected function getColumns()
    {
        return [
            'id',
            'created_at',
            'updated_at',
        ];
    }

    protected function filename()
    {
        return 'alerttypedatatables_' . time();
    }
}
