<?php

namespace App\Http\Controllers\Admin;

use App\Models\AlertType;
use App\Http\Helpers\Common;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\AlertTypeDataTable;
use App\Http\Requests\AlertTypeRequest;

class AlertTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AlertTypeDataTable $dataTable)
    {
        return $dataTable->render('admin.alert-types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.alert-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlertTypeRequest $request)
    {
        AlertType::create($request->all());
        Common::one_time_message('success', 'Added Successfully');
        return redirect()->route('alert-types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alertType = AlertType::findOrFail($id);
        return view('admin.alert-types.edit', compact('alertType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlertTypeRequest $request, $id)
    {
        $alertType = AlertType::findOrFail($id);
        $alertType->update($request->all());
        Common::one_time_message('success', 'Updated Successfully');
        return redirect()->route('alert-types.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alertType = AlertType::findOrFail($id);
        $alertType->delete();
        Common::one_time_message('success', 'Deleted Successfully');
        return redirect()->route('alert-types.index');
    }

}
