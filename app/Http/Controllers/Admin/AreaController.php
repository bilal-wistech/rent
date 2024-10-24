<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;
use App\DataTables\AreaDataTable;
use App\Http\Controllers\Controller;
use App\DataTables\AreaDataTableModel;

class AreaController extends Controller
{

    public function index()
    {

      }
    public function create()
    {

    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'required',
        ]);

        try {
            $city = City::findOrFail($request->city_id);
    Area::create([
                'name' => $request->name,
                'city_id' => $request->city_id,
                'country_id' => $city->country_id,
            ]);

            return redirect()->back()
                ->with('success', 'Area added successfully!')
                ->with('cityId', $city->city_id);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while adding the area.');
        }
    }

     public function show($id)
{
    try {
        $dataTable = new AreaDataTable($id);
        return $dataTable->render('admin.area.view', ['cityId' => $id]);
    } catch (\Exception $e) {
        \Log::error($e->getMessage());
        return response()->json(['error' => 'An error occurred.'], 500);
    }
}

    public function add($cityId)
    {
 return view('admin.area.add', compact('cityId'));
    }
    public function edit($id)
    {

        $area = Area::findOrFail($id);
        if($area){
            return view('admin.area.edit', compact('area'));
        }
        else{
            return redirect()->back()->with('error', 'An error occurred while deleting the area.');

        }
      }


    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);


            $area= Area::find($id);
            $area->name = $request->name;
            $area->save();
            return view('admin.area.edit', [
                'area' =>$area,
                'success', 'City updated successfully'
            ]);

    }
    public function addAjax(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required',
        ]);

        $city = City::where('name', $request->input('city'))->first();

        if (!$city) {
            return response()->json([
                'status' => 'error',
                'message' => 'City not found'
            ], 404);
        }

        $area = Area::create([
            'name' => $request->input('name'),
            'city_id' => $city->id,
            'country_id' => $city->country_id,
        ]);

        return response()->json([
            'status' => 'success',
            'area' => $area,
        ]);
    }

    public function destroy($id)
    {
        try {
            $area = Area::findOrFail($id);
            $area->delete();
          return redirect()->back()->with('success', 'Area deleted successfully.');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
           return redirect()->back()->with('error', 'An error occurred while deleting the area.');
        }
    }


}
