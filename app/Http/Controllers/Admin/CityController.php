<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

    }

    public function show($id)
    {

        $cities=  City::where('country_id', $id)->get();
        return view('admin.countrys.viewCIty', compact('cities'));
    }


    public function edit($id)
    {
        //
    }

      public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
