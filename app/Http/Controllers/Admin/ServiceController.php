<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\DataTables\ServicesDataTable;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index(ServicesDataTable $dataTable)
    {
        return $dataTable->render('admin.services.index');
    }

    /**
     * Display the specified service.
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.show', compact('service'));
    }
}
