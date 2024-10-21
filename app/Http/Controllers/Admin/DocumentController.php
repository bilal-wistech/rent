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

        return view('admin.customers.addDocument', [ 'documentActive' =>'active',]);

    }



    public function create(Request $request)
    {
        $document = Document::where('id', $request->id)->first();
        $user = User::find($document->user_id);
         return view('admin.customers.editDocument')->with([
            'documentActive' => 'active',
            'user'=>$user,
            'document' => $document,
            'success' => 'Emergency contact information has been saved successfully.',

        ]);
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
    $documents = Document::where('user_id', $request->user_id)->get();
    return view('admin.customers.viewDocument')->with([
        'success' => 'Document created successfully.',
        'user' => User::findOrFail($request->user_id),
        'document' => $documents,
        'documentActive' => 'active'
    ]);
}



    public function show($id)
    {
        $document = Document::where('user_id', $id)->get();
        $user = User::findOrFail($id);
      if ($document) {
        return view('admin.customers.viewDocument', ['document' => $document, 'user' => $user, 'documentActive' =>'active',]);
        }
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);

          return view('admin.customers.addDocument', [
                'user' => $user,
                'documentActive' => 'active',
            ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'type' => 'required',
            'expire' => 'required|date'
        ]);
        $doc = Document::find($id);
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
        $user = User::findOrFail($doc->user_id);
        return redirect()->back()->with([
            'success' => 'Document updated successfully.',
            'user' => $user,
            'document'=> $doc,
            'documentActive' =>'active'
        ]);

    }



    public function destroy($id)
    {
        $document = Document::find($id);


        if ($document) {
            $user = User::find($document->user_id);
           if ($document->image) {
                Storage::delete($document->image);
           }
            $document->delete();

            return redirect()->back()->with([
                'success' => 'Document deleted successfully.',
                'user' => $user
            ]); } else {

            return redirect()->back()->with('error', 'Document not found.');
        }

    }

}
