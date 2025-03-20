<?php

namespace App\DataTables;

use App\Models\City;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CityDataTable extends DataTable
{
    public $countryId;

    public function __construct($countryId = null)
    {
        $this->countryId = $countryId;
    }

    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('action', function ($city) {
                $view = '<a href="' . route('area.show', $city->id) . '" class="btn btn-xs btn-info">
                    <i class="fa fa-home" style="color: white;"></i>
                </a>';
                $edit = '<a href="' . route('city.edit', $city->id) . '" class="btn btn-xs btn-primary" onclick="editCity(' . $city->id . ')">
                    <i class="fa fa-edit"></i>
                </a>&nbsp;';
                $delete = '<form action="' . route('city.destroy', $city->id) . '" method="POST" style="display:inline;">
                    ' . csrf_field() . '
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>';

                return $view . ' ' . $edit . ' ' . $delete;
            })
            ->editColumn('image', function ($city) {
                if ($city->image) {
                    return '<img src="' . asset('front/images/front-cities/' . $city->image) . '" width="50" height="50" style="border-radius:5px;">';
                }
                return '<span>No Image</span>';
            })
            ->rawColumns(['action', 'image']) // Ensure `image` column is treated as HTML
            ->make(true);
    }

    public function query()
    {
        $query = City::query()->select(['cities.id', 'cities.name', 'cities.image', 'cities.country_id']);

        if ($this->countryId) {
            $query->where('country_id', $this->countryId);
        }

        return $this->applyScopes($query->orderBy('id', 'asc'));
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'cities.id', 'title' => 'ID', 'orderable' => true])
            ->addColumn(['data' => 'name', 'name' => 'cities.name', 'title' => 'Name', 'orderable' => true])
            ->addColumn(['data' => 'image', 'name' => 'cities.image', 'title' => 'Image', 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }

    protected function filename()
    {
        return 'City_' . date('YmdHis');
    }
}
