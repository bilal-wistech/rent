<?php

namespace App\DataTables;

use App\Models\EnquiryMessage;
use Yajra\DataTables\Services\DataTable;

class EnquiryMessagesDataTable extends DataTable
{
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('action', function ($message) {
                $view = '<a href="' . route('enquiries.view', $message->id) . '" class="btn btn-xs btn-info" title="View"><i class="fa fa-eye"></i></a>';
                return $view;
            })
            ->editColumn('created_at', function ($message) {
                return $message->created_at->format('d F, Y - h:i A');
            })
            ->rawColumns(['action']) // allows HTML buttons
            ->make(true);
    }

    public function query()
    {
        $query = EnquiryMessage::select(['id', 'name', 'email', 'subject', 'message', 'created_at']);
        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Name'])
            ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Email'])
            ->addColumn(['data' => 'subject', 'name' => 'subject', 'title' => 'Subject'])
            ->addColumn(['data' => 'message', 'name' => 'message', 'title' => 'Message'])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Submitted At'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions()); // if you have a helper for this
    }

    protected function filename()
    {
        return 'EnquiryMessages_' . date('YmdHis');
    }
}
