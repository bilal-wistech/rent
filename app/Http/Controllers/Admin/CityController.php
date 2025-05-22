<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\DataTables\CityDataTable;
use App\Http\Controllers\Controller;


class CityController extends Controller
{

    public function index()
    {
    }
    public function create()
    {
    }
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country_id' => 'required',
        ]);

        try {
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $directory = public_path('front/images/front-cities');

                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                $image->move($directory, $imageName);
            }
            $city = City::create([
                'name' => $request->name,
                'country_id' => $request->country_id,
                'image' => $imageName,
            ]);

            if (!$city) {
                return redirect()->back()->with('error', 'Failed to add city. Please try again.');
            }

            // return redirect()->back()
            //     ->with('success', 'City added successfully!')
            //     ->with('countryId', $request->country_id);

            return redirect()->route('city.show', $request->country_id)
                ->with('success', 'City added successfully!');


        } catch (\Exception $e) {
            \Log::error('Error adding city: ' . $e->getMessage());
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country_id' => 'required',
        ]);

        $city = City::findOrFail($id);
        $city->name = $request->name;
        if ($request->hasFile('image')) {

            $oldImagePath = public_path('front/images/front-cities/' . $city->image);
            if (file_exists($oldImagePath) && !is_dir($oldImagePath)) {
                unlink($oldImagePath);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('front/images/front-cities'), $imageName);

            $city->image = $imageName;
        }

        $city->save();

        //return redirect()->route('city.edit', $city->id)->with('success', 'City updated successfully');
        return redirect()->route('city.show', $request->country_id)
            ->with('success', 'City updated successfully!');

    }
    public function destroy($id)
    {
        try {
            $city = City::findOrFail($id);
            if ($city->image) {
                $imagePath = public_path('front/images/front-cities/' . $city->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $city->delete();

            return redirect()->back()->with('success', 'City deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('Error deleting city: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting the city.');
        }
    }

}
