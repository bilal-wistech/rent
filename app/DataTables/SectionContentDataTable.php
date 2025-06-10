<?php

namespace App\DataTables;

use App\Models\SectionContent;
use Yajra\DataTables\Services\DataTable;

class SectionContentDataTable extends DataTable
{
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->editColumn('icon', function ($section) {
                if ($section->icon) {
                    return '<i class="' . e($section->icon) . '" style="font-size: 20px;"></i> ' . e($section->icon);
                }
                return '—';
            })
            ->editColumn('status', function ($section) {
                $text = $section->status ? 'Active' : 'Inactive';
                return '<span style="background-color: #e0e0e0; color: black; padding: 4px 8px; border-radius: 4px;">' . $text . '</span>';
            })
            ->addColumn('description', function ($section) {
                return $section->description ?: '—';
            })
            ->addColumn('action', function ($section) {
                $edit = '<a href="' . route('section-contents.edit', $section->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> ';
                $delete = '<form action="' . route('section-contents.destroy', $section->id) . '" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Are you sure you want to delete this?\')">'
                    . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                    </form>';
                return $edit . ' ' . $delete;
            })
            ->rawColumns(['icon', 'status', 'action', 'description'])
            ->make(true);
    }

    public function query()
    {
        $query = SectionContent::query()->orderBy('id', 'desc');
        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'name', 'name' => 'section_contents.name', 'title' => 'Name'])
            ->addColumn(['data' => 'description', 'name' => 'section_contents.description', 'title' => 'Description'])
            ->addColumn(['data' => 'type', 'name' => 'section_contents.type', 'title' => 'Type'])
            ->addColumn(['data' => 'icon', 'name' => 'section_contents.icon', 'title' => 'Icon'])
            ->addColumn(['data' => 'status', 'name' => 'section_contents.status', 'title' => 'Status'])
            ->addColumn(['data' => 'parent_id', 'name' => 'section_contents.parent_id', 'title' => 'Parent ID'])
            ->addColumn(['data' => 'sort_order', 'name' => 'section_contents.sort_order', 'title' => 'Sort Order'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }

    protected function filename()
    {
        return 'sectioncontent_' . time();
    }
}
