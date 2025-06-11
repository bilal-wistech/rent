<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\EnquiryMessagesDataTable;
use App\Http\Controllers\Controller;
use App\Models\EnquiryMessage;
use Illuminate\Http\Request;

class EnquiryMessageController extends Controller
{
    public function index(EnquiryMessagesDataTable $dataTable)
    {
        return $dataTable->render('admin.enquiries.index');
    }

    public function show($id)
    {
        $message = EnquiryMessage::findOrFail($id);
        return view('admin.enquiries.show', compact('message'));
    }
}
