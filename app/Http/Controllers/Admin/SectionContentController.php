<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SectionContent;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;
use App\DataTables\SectionContentDataTable;

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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'icon' => 'nullable|string|max:255', // now it's just a string
            'type' => 'required',
            'parent_id' => 'nullable|integer',
        ]);

        SectionContent::create([
            'name' => $request->name,
            'description' => Purifier::clean($request->desc), // Sanitize HTML
            'icon' => $request->icon,
            'type' => $request->type,
            'parent_id' => $request->input('parent_id', 0),
            'status' => 1,
            'sort_order' => $request->sort_order
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
        $sectionContent = SectionContent::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'icon' => 'nullable|string|max:255', // treat icon as plain string
            'type' => 'required',
            'parent_id' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);
        $sectionContent->update([
            'name' => $request->name,
            'description' => Purifier::clean($request->desc), // Sanitize HTML
            'icon' => $request->icon,
            'type' => $request->type,
            'parent_id' => $request->input('parent_id', 0),
            'status' => $request->status,
            'sort_order' => $request->sort_order
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
