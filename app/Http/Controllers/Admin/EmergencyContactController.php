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



    public function create(Request $request)
    {
        try {
            $request->validate([
                'emergency_contact_name.*' => 'required|string|max:255',
                'emergency_contact_relation.*' => 'required|string|max:255',
                'emergency_contact_number.*' => 'required|string|max:30',
            ]);
            $user = User::find($request->user_id);
             $emergencyContacts = [];

             for ($i = 0; $i < count($request->emergency_contact_name); $i++) {
                 $emergencyContacts[] = [
                     'user_id' => $request->user_id,
                     'name' => $request->emergency_contact_name[$i],
                     'relation' => $request->emergency_contact_relation[$i],
                     'contact_number' => $request->emergency_contact_number[$i],
                     'created_at' => now(),
                     'updated_at' => now(),
                 ];
             }
             EmergencyContact::insert($emergencyContacts);
            return redirect()->back()->with( [
               'success'=> "Emergency Contacts added successfully ",
               'user' => $user,
            'emergencycontact' => $emergencyContacts,
            'emergencyActive' => 'active'

            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('Error adding emergency contact');
              }
    }


    public function store(Request $request)
    {
        $request->validate([
            'emergency_contact_name.*' => 'required|string|max:255',
            'emergency_contact_relation.*' => 'required|string|max:255',
            'emergency_contact_number.*' => 'required|string|max:20',
        ]);
        $emergencyContactIds = $request->input('emergency_contact_id', []); // Default to empty array if null
        $names = $request->input('emergency_contact_name');
        $relations = $request->input('emergency_contact_relation');
        $contact_numbers = $request->input('emergency_contact_number');
        foreach ($names as $index => $name) {
            EmergencyContact::updateOrCreate(
                [
                    'id' => $emergencyContactIds[$index] ?? null,
                    'user_id' => $request->user_id
                ],
                [
                    'name' => $name,
                    'relation' => $relations[$index],
                    'contact_number' => $contact_numbers[$index]
                ]
            );
        }
        $user = User::findOrFail($request->user_id);

        return redirect()->back()->with([
            'emergencyActive' => 'active',
            'success' => 'Emergency contacts updated successfully.',
            'user' => $user,
        ]);
    }


    public function show($id)
    {
        //
    }



    public function edit($id)
{
    $emergencycontact = EmergencyContact::where('user_id', $id)->get();
    $user = User::findOrFail($id);
    if ($emergencycontact->isNotEmpty()) {
        $user = User::findOrFail($id);
        return view('admin.customers.editEmergencyContacts', [
            'user' => $user,
            'emergencycontact' => $emergencycontact,
            'emergencyActive' => 'active'
        ]);
          }
         else {
            return view('admin.customers.addEmergencyDetail', [
                'user' => $user,
                'emergencyActive' => 'active'
            ]);

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
