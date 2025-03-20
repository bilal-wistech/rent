<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\DataTables\CityDataTable;
use App\Http\Controllers\Controller;

class CityController extends Controller
{

    public function index() {}
    public function create() {}
    public function addAjax(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required',
        ]);

        $country = Country::where('short_name', $request->input('country'))->first();
        if (!$country) {
            return response()->json(['status' => 'error', 'message' => 'Country not found.'], 404);
        }

        $city = City::create([
            'name' => $request->input('name'),
            'country_id' => $country->id,
        ]);

        return response()->json([
            'status' => 'success',
            'city' => $city
        ]);
    }




    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required',
        ]);
        try {
            City::create([
                'name' => $request->name,
                'country_id' => $request->country_id,
            ]);

            return redirect()->back()
                ->with('success', 'City added successfully!')
                ->with('countryId', $request->country_id);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while adding the city.');
        }
    }

    public function show($countryId)
    {
        try {
            $dataTable = new CityDataTable($countryId);
            return $dataTable->render('admin.city.view', ['countryId' => $countryId]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }

    public function add($countryId)
    {
        return view('admin.city.add', compact('countryId'));
    }
    public function edit($countryId)
    {
        $city = City::find($countryId);
        return view('admin.city.edit', compact('city'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);


        $city = City::find($id);
        $city->name = $request->name;
        $city->save();
        session()->flash('success', 'City updated successfully');
        return view('admin.city.edit', [
            'city' => $city,

        ]);
    }
    public function destroy($id)
    {

        $city = City::find($id);

        if ($city) {
            $city->delete();
            return redirect()->back()->with('success', 'City deleted successfully.');
        }
        return redirect()->back()->with('error', 'City not found.');
    }
}
