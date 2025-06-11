<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\PropertySeo;
use App\Models\Properties;

class PropertySeoController extends Controller
{
    /**
     * Show the form to create SEO for a property
     */
    public function create($property_id)
    {
        $seo = PropertySeo::where('property_id', $property_id)->first();

        if ($seo) {
            return redirect()->route('seo.edit', $property_id);
        }

        $result = Properties::findOrFail($property_id);
        return view('admin.listing.create', compact('result'));
    }

    /**
     * Store the SEO details
     */
    public function store(Request $request, $property_id)
    {
        // $request->validate([
        //     'title' => 'required|string',
        //     'description' => 'required|string',
        //     'image' => 'nullable|image|max:2048',
        // ]);

        $docData = [
            'property_id' => $property_id,
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $folder = public_path('uploads/seo_images');

            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }

            $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($folder, $filename);

            $docData['image'] = 'uploads/seo_images/' . $filename;
        }

        PropertySeo::create($docData);

        return redirect()->route('seo.edit', $property_id)->with('success', 'SEO created successfully.');
    }

    /**
     * Show the form to edit SEO
     */
    public function edit($property_id)
    {
        $result = Properties::findOrFail($property_id);
        $seo = PropertySeo::where('property_id', $property_id)->firstOrFail(); // use firstOrFail to ensure it's found

        return view('admin.listing.edit', compact('result', 'seo'));
    }


    /**
     * Update the SEO details
     */
    public function update(Request $request, $property_id)
    {
        // $request->validate([
        //     'title' => 'required|string',
        //     'description' => 'required|string',
        //     'image' => 'nullable|image|max:2048',
        // ]);

        $seo = PropertySeo::where('property_id', $property_id)->firstOrFail();

        $seo->title = $request->title;
        $seo->description = $request->description;

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $folder = public_path("uploads/seo_images");

            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }

            $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($folder, $filename);

            // Delete old image
            if ($seo->image && file_exists(public_path($seo->image))) {
                unlink(public_path($seo->image));
            }

            $seo->image = "uploads/seo_images/{$filename}";
        }

        $seo->save();

        return redirect()->route('seo.edit', $property_id)->with('success', 'SEO updated successfully.');
    }

}
