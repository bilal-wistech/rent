<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\AreaSeo;
use Illuminate\Http\Request;

class AreaSeoController extends Controller
{
    public function edit($areaId)
    {
        $area = Area::with('city.country')->findOrFail($areaId);
        $seo = AreaSeo::where('area_id', $areaId)->first();

        return view('admin.area_seos.form', compact('area', 'seo'));
    }

    public function update(Request $request, $areaId)
    {
        $area = Area::with('city.country')->findOrFail($areaId);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only('title', 'description');

        // Include city_id and country_id from the related models
        $data['city_id'] = $area->city->id;
        $data['country_id'] = $area->city->country->id;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('seo/area'), $imageName);
            $data['image'] = $imageName;
        }

        AreaSeo::updateOrCreate(
            ['area_id' => $areaId],
            $data
        );

        return redirect()->back()->with('success', 'SEO info saved.');
    }
}
