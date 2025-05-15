<?php

namespace App\Http\Controllers\Admin;

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
}
