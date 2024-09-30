<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    { $document = Document::where('user_id', $id)->first();
      if ($document) {
        $user = User::findOrFail($id);
        return view('admin.customers.editDocument', ['document' => $document, 'user' => $user]);
        }
   else {
            abort(404, 'Document not found for this user.');
       }
    }



    public function update(Request $request, Document $document)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'type' => 'required',
            'expire' => 'required|date'
        ]);
        $doc = Document::find($document->id);
        $doc->type = $request->type;
        $doc->expire = $request->expire;
        if ($request->hasFile('image')) {
            if ($doc->image) {
                Storage::disk('public')->delete($doc->image);
            }
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('documents', $filename, 'public');
            $doc->image = $path;
        }
        $doc->save();
        $user = User::findOrFail($document->user_id);
        return redirect()->back()->with([
            'success' => 'Document updated successfully.',
            'user' => $user,
            'document'=> $doc
        ]);

    }



    public function destroy($id)
    {
        //
    }
}
