<?php

namespace App\DataTables;

use App\Models\Area;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AreaDataTable extends DataTable
{
    public $countryId;
    public function __construct($cityId = null)
    {
        $this->cityId = $cityId;
    }
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('action', function ($area) {
                $edit = '<a href="' . route('area.edit', $area->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>&nbsp;';
                $delete = '
                <form action="' . route('area.destroy', $area->id) . '" method="POST" style="display:inline;">
                    ' . csrf_field() . '
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>';
                return  $edit . ' ' . $delete;
            })
            ->editColumn('image', function ($area) {
                if ($area->image) {
                    return '<img src="' . asset('front/images/front-areas/' . $area->image) . '" width="50" height="50" style="border-radius:5px;">';
                }
                return '<span>No Image</span>';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }
        public function query()
        {
            $query = Area::query();
         if ($this->cityId) {
                $query->where('city_id', $this->cityId);
            }
         $query->orderBy('id', 'asc');
          return $this->applyScopes($query);
        }

        public function html()
        {
            return $this->builder()
                ->addColumn(['data' => 'id', 'name' => 'areas.id', 'title' => 'ID', 'orderable' => true])
                ->addColumn(['data' => 'name', 'name' => 'areas.name', 'title' => 'Name', 'orderable' => true])
                ->addColumn(['data' => 'image', 'name' => 'areas.image', 'title' => 'Image', 'orderable' => false, 'searchable' => false])
                ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
                ->parameters(dataTableOptions());
        }



    protected function filename()
    {
        return 'Area_' . date('YmdHis');
    }
}
