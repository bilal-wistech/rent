<?php

namespace App\DataTables;

use App\Models\SectionContent;
use Yajra\DataTables\Services\DataTable;

class SectionContentDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     */
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->editColumn('icon', function ($section) {
                if ($section->icon) {
                    return '<img src="' . asset('storage/' . $section->icon) . '" alt="Icon" width="40">';
                }
                return '—';
            })
            ->editColumn('status', function ($section) {
                $text = $section->status ? 'Active' : 'Inactive';
                return '<span style="background-color: #e0e0e0; color: black; padding: 4px 8px; border-radius: 4px;">' . $text . '</span>';
            })
            ->addColumn('action', function ($section) {
                //$view = '<a href="' . route('section-contents.show', $section->id) . '" class="btn btn-xs btn-info"><i class="fa fa-eye" style="color: white;"></i></a>';
                $edit = '<a href="' . route('section-contents.edit', $section->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>&nbsp;';
                $delete = '<form action="' . route('section-contents.destroy', $section->id) . '" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Are you sure you want to delete this?\')">'
                    . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                    </form>';
                return $edit . ' ' . $delete;
            })
            ->rawColumns(['icon', 'status', 'action'])
            ->make(true);
    }

    /**
     * Get the query object to be processed by DataTables.
     */
    public function query()
    {
        $query = SectionContent::query();
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'name', 'name' => 'section_contents.name', 'title' => 'Name'])
            ->addColumn(['data' => 'decsription', 'name' => 'section_contents.desc', 'title' => 'Description'])
            ->addColumn(['data' => 'type', 'name' => 'section_contents.type', 'title' => 'Type'])
            ->addColumn(['data' => 'icon', 'name' => 'section_contents.icon', 'title' => 'Icon'])
            ->addColumn(['data' => 'status', 'name' => 'section_contents.status', 'title' => 'Status'])
            ->addColumn(['data' => 'parent_id', 'name' => 'section_contents.parent_id', 'title' => 'Parent ID'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }

    /**
     * Optional filename for export buttons.
     */
    protected function filename()
    {
        return 'sectioncontent_' . time();
    }
}
