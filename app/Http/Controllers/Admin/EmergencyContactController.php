<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\EmergencyContact;
use App\Http\Controllers\Controller;

class EmergencyContactController extends Controller
{
    public function index()
    {

    }



    public function create()
    {
        //
    }


    public function store(Request $request )
    {
        $request->validate([
                'emergency_contact_name.*' => 'required|string|max:255',
                'emergency_contact_relation.*' => 'required|string|max:255',
                'emergency_contact_number.*' => 'required|string|max:20',
            ]);

            $emergencyContactIds = $request->input('emergency_contact_id');
            $names = $request->input('emergency_contact_name');
            $relations = $request->input('emergency_contact_relation');
            $contact_number= $request->input('emergency_contact_number');

            foreach ($emergencyContactIds as $index => $id) {
                $emergencyContact = EmergencyContact::find($id);
                if ($emergencyContact) {
                    $emergencyContact->update([
                        'name' => $names[$index],
                        'relation' => $relations[$index],
                        'contact_number' => $contact_number[$index],
                    ]);
                }
            }
            $user = User::findOrFail($request->id);
            return redirect()->back()->with([
                'success' => 'Emergency contacts updated successfully.',
                'user' => $user
            ]);

    }


    public function show($id)
    {
        //
    }



    public function edit($id)
{
    $emergencycontact = EmergencyContact::where('user_id', $id)->get();
    if ($emergencycontact->isNotEmpty()) {
        $user = User::findOrFail($id);
        return view('admin.customers.editEmergencyContacts', compact(['user', 'emergencycontact']));  } else {
        abort(404, 'Emergency Contact not found for this user.');
    }
}



public function update(Request $request)
{
}




    public function destroy($id)
    {
        //
    }

}
