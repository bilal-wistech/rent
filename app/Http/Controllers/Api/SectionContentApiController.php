<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SectionContent;

class SectionContentApiController extends Controller
{
    public function index()
    {
        return response()->json(SectionContent::all());
    }

    public function show($id)
    {
        $section = SectionContent::find($id);
        if (!$section) {
            return response()->json(['error' => 'Not Found'], 404);
        }
        return response()->json($section);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'type' => 'required|in:features,services,additionalServices',
            'parent_id' => 'nullable|integer',
        ]);

        $section = SectionContent::create([
            'name' => $validated['name'],
            'decsription' => $validated['desc'] ?? null,
            'icon' => $validated['icon'] ?? null,
            'type' => $validated['type'],
            'parent_id' => $request->input('parent_id', 0),
            'status' => 1,
        ]);

        return response()->json($section, 201);
    }

    public function update(Request $request, $id)
    {
        $section = SectionContent::find($id);
        if (!$section) {
            return response()->json(['error' => 'Not Found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'type' => 'required|in:features,services,additionalServices',
            'parent_id' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        $section->update([
            'name' => $validated['name'],
            'decsription' => $validated['desc'] ?? null,
            'icon' => $validated['icon'] ?? null,
            'type' => $validated['type'],
            'parent_id' => $request->input('parent_id', 0),
            'status' => $validated['status'],
        ]);

        return response()->json($section);
    }

    public function destroy($id)
    {
        $section = SectionContent::find($id);
        if (!$section) {
            return response()->json(['error' => 'Not Found'], 404);
        }

        $section->delete();
        return response()->json(['message' => 'Deleted'], 204);
    }
}
