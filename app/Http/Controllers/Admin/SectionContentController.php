<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\SectionContentDataTable;
use App\Models\SectionContent;
use Illuminate\Http\Request;

class SectionContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SectionContentDataTable $dataTable)
    {
        return $dataTable->render('admin.section_contents.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all records with parent_id = 0 to show as parents
        $parents = SectionContent::where('parent_id', 0)->get();

        return view('admin.section_contents.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'icon' => 'nullable|file|mimes:ico,png,svg|max:1024', // max 1MB
            'type' => 'required|in:features,services,additionalServices',
            'parent_id' => 'nullable|integer', // validate parent_id if passed
        ]);

        // Get parent_id from request or default to 0
        $parentId = $request->input('parent_id', 0);

        $iconPath = null;

        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('icons', 'public');

            // If a parent_id was not selected or is 0, try to find the parent record automatically
            if ($parentId == 0) {
                $parent = SectionContent::where('type', $request->type)
                    ->where(function ($query) {
                        $query->whereNull('icon')->orWhere('icon', '');
                    })
                    ->where('parent_id', 0)
                    ->first();

                if ($parent) {
                    $parentId = $parent->id;
                }
            }
        } else {
            // No icon uploaded -> parent record itself (parent_id should be 0)
            $parentId = 0;
        }

        SectionContent::create([
            'name' => $request->name,
            'decsription' => $request->desc,
            'icon' => $iconPath,
            'type' => $request->type,
            'parent_id' => $parentId,
            'status' => 1,
        ]);

        return redirect()->route('section-contents.index')->with('success', 'Section content created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Fetch the SectionContent by id
        $sectionContent = SectionContent::findOrFail($id);

        // Fetch parents with parent_id = 0 (excluding the current record to avoid self-parenting)
        $parents = SectionContent::where('parent_id', 0)
            ->where('id', '!=', $id)
            ->get();

        return view('admin.section_contents.edit', compact('sectionContent', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'icon' => 'nullable|file|mimes:ico,png,svg|max:1024', // max 1MB
            'type' => 'required|in:features,services,additionalServices',
            'parent_id' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        $sectionContent = SectionContent::findOrFail($id);

        // Determine parent_id similarly as in store
        $parentId = $request->input('parent_id', 0);
        $iconPath = $sectionContent->icon; // Keep old icon by default

        if ($request->hasFile('icon')) {
            // Store new icon
            $iconPath = $request->file('icon')->store('icons', 'public');

            if ($parentId == 0) {
                $parent = SectionContent::where('type', $request->type)
                    ->where(function ($query) {
                        $query->whereNull('icon')->orWhere('icon', '');
                    })
                    ->where('parent_id', 0)
                    ->first();

                if ($parent) {
                    $parentId = $parent->id;
                }
            }
        } else {
            // No new icon uploaded, if parent_id was 0, keep it 0 or existing
            if ($parentId == 0) {
                $parentId = 0;
            }
        }

        $sectionContent->update([
            'name' => $request->name,
            'decsription' => $request->desc,
            'icon' => $iconPath,
            'type' => $request->type,
            'parent_id' => $parentId,
            'status' => $request->status, // keep status as-is or modify if needed
        ]);

        return redirect()->route('section-contents.index')->with('success', 'Section content updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SectionContent $sectionContent)
    {
        $sectionContent->delete();

        return redirect()->route('section-contents.index')->with('success', 'Section content deleted successfully.');
    }

    /**
     * Optional: Show a single section content (if needed)
     */
    public function show(SectionContent $sectionContent)
    {
        return view('admin.section_contents.show', ['section' => $sectionContent]);
    }
}
