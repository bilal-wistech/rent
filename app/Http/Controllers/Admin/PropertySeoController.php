<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use Illuminate\Http\Request;
use App\Models\PropertySeo;

class PropertySeoController extends Controller
{
    public function edit($propertyId)
    {
        $property = Properties::with('property_address')->findOrFail($propertyId);

        $seo = PropertySeo::where('property_id', $propertyId)->first();

        return view('admin.property_seos.form', compact('property', 'seo'));
    }

    public function update(Request $request, $propertyId)
    {
        $property = Properties::with('property_address')->findOrFail($propertyId);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only('title', 'description');

        // Optional: You can save related address details if needed
        $data['property_id'] = $propertyId;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('seo/property'), $imageName);
            $data['image'] = $imageName;
        }

        PropertySeo::updateOrCreate(
            ['property_id' => $propertyId],
            $data
        );

        return redirect()->to('admin/properties')->with('success', 'SEO info saved successfully.');
    }
}

