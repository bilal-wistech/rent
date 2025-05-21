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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'city_id' => 'required|exists:cities,id',
        ]);

        try {
            $city = City::findOrFail($request->city_id);
            $imageName = null;

            if ($request->file('image')) {

                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $directory = public_path('front/images/front-areas');

                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                $image->move($directory, $imageName);
            }


            Area::create([
                'name' => $request->name,
                'image' => $imageName,
                'city_id' => $city->id,
                'country_id' => $city->country_id,
            ]);

            // return redirect()->back()
            //     ->with('success', 'Area added successfully!')
            //     ->with('cityId', $city->id);
            return redirect()->route('area.show', $city->id)->with('success', 'Area added successfully!');


        } catch (\Exception $e) {
            \Log::error('Error adding area: ' . $e->getMessage());
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
        if ($area) {
            return view('admin.area.edit', compact('area'));
        } else {
            return redirect()->back()->with('error', 'An error occurred while deleting the area.');

        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $area = Area::findOrFail($id);
        $area->name = $request->name;

        if ($request->hasFile('image')) {
            if ($area->image) {
                $oldImagePath = public_path('front/images/front-areas/' . $area->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('front/images/front-areas'), $imageName);
            $area->image = $imageName;
        }

        $area->save();

        return redirect()->back()->with('success', 'Area updated successfully');
    }

    public function addAjax(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required',
        ]);

        $city = City::findOrFail($request->city);

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
        if ($area->image) {
                $imagePath = public_path('front/images/front-areas/' . $area->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
      $area->delete();

            return redirect()->back()->with('success', 'Area deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('Error deleting area: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting the area.');
        }
    }



}
