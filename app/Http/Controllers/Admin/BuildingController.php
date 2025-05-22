<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BuildingDataTable;
use App\Models\Area;
use App\Models\Building;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuildingController extends Controller
{
    public function addAjax(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area = Area::findOrFail($request->area);

        if (!$area) {
            return response()->json([
                'status' => 'error',
                'message' => 'Area not found'
            ], 404);
        }

        $building = Building::create([
            'name' => $request->input('name'),
            'city_id' => $area->city_id,
            'country_id' => $area->country_id,
            'area_id' => $area->id,
        ]);

        return response()->json([
            'status' => 'success',
            'building' => $building,
        ]);
    }

    public function add($areaId)
    {
        $area = \App\Models\Area::findOrFail($areaId);

        return view('admin.building.add', compact('area'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'area_id' => 'required|exists:areas,id',
        ]);

        $area = Area::findOrFail($request->area_id);

        Building::create([
            'name' => $validated['name'],
            'area_id' => $area->id,
            'city_id' => $area->city_id,
            'country_id' => $area->country_id,
        ]);

        return redirect()->route('building.view', $request->area_id)
            ->with('success', 'Building added successfully!');

    }


    public function view(BuildingDataTable $dataTable, $areaId)
    {
        $area = Area::findOrFail($areaId);
        $dataTable->areaId = $area->id;

        // This will pass $dataTable variable to the view automatically
        return $dataTable->render('admin.building.view', compact('area'));
    }

    public function edit($id)
    {
        $building = Building::findOrFail($id);

        return view('admin.building.edit', compact('building'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $building = Building::findOrFail($id);
        $building->name = $request->name;
        $building->save();

        return redirect()->route('building.view', $building->area_id)->with('success', 'Building updated successfully.');
    }

    public function destroy($id)
    {
        $building = Building::findOrFail($id);
        $areaId = $building->area_id; // To redirect back to the area view

        $building->delete();

        return redirect()
            ->route('building.view.area', $areaId)
            ->with('success', 'Building deleted successfully.');
    }


}
