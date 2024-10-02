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
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg',
        'type' => 'required',
        'expire' => 'required|date'
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('documents', $filename, 'public');
    }

    $document = Document::create([
        'user_id' => $request->user_id,
        'image' => $path,
        'expire' => $request->expire,
        'type' => $request->type,
    ]);

    return redirect()->back()->with([
        'success' => 'Document created successfully.',
        'user' => User::findOrFail($request->user_id),
        'document' => $document,
        'documentActive' => 'active'
    ]);
}



    public function show($id)
    {
        //
    }


    public function edit($id)
    { $document = Document::where('user_id', $id)->first();
        $user = User::findOrFail($id);
      if ($document) {
        return view('admin.customers.editDocument', ['document' => $document, 'user' => $user, 'documentActive' =>'active',]);
        }
        else {
            return view('admin.customers.editDocument', [
                'document' => null,
                'user' => $user,
                'documentActive' => 'active',
            ]);
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
            'document'=> $doc,
            'documentActive' =>'active'
        ]);

    }



  public function destroy($id)
    {
        //
    }
}
