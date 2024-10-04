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
    {     $emergencycontact = EmergencyContact::where('id', $request->id)->first();
        $user = User::find($emergencycontact->user_id);
         return view('admin.customers.editEmergencyContacts')->with([
            'emergencyActive' => 'active',
            'user'=>$user,
            'emergencycontacts' => $emergencycontact,
            'success' => 'Emergency contact information has been saved successfully.',

        ]);

    }


    public function store(Request $request)
    {

        $request->validate([
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_relation' => 'required|string|max:255',
            'emergency_contact_number' => 'required|string|max:20',
        ]);
        EmergencyContact::Create(
            [
                  'name' => $request->emergency_contact_name,
                  'relation' =>$request->emergency_contact_relation,
                  'contact_number' => $request->emergency_contact_number,
                  'user_id' => $request->user_id
              ]
          );
        $user = User::findOrFail($request->user_id);
        $emergencycontact = EmergencyContact::where('user_id', $user->id)->get();
        return view('admin.customers.viewEmergencyDetail')->with([
            'emergencyActive' => 'active',
            'emergencycontacts' => $emergencycontact,
            'success' => 'Emergency contact information has been saved successfully.',
            'user' => $user,
        ]);

    }


    public function show($id)
    {
        $emergencycontact = EmergencyContact::where('user_id', $id)->get();
        $user = User::findOrFail($id);

            $user = User::findOrFail($id);
            return view('admin.customers.viewEmergencyDetail', [
                'user' => $user,
                'emergencycontacts' => $emergencycontact,
                'emergencyActive' => 'active'
            ]);



    }



    public function edit($id)
{
    $user = User::findOrFail($id);
             return view('admin.customers.addEmergencyDetail', [
                 'user' => $user,
                'emergencyActive' => 'active'
             ]);
    // $emergencycontact = EmergencyContact::where('user_id', $id)->get();
    // $user = User::findOrFail($id);

    // if ($emergencycontact->isNotEmpty()) {
    //     $user = User::findOrFail($id);
    //     return view('admin.customers.editEmergencyContacts', [
    //         'user' => $user,
    //         'emergencycontact' => $emergencycontact,
    //         'emergencyActive' => 'active'
    //     ]);
    //       }
    //      else {
    //         $user = User::findOrFail($id);
    //         return view('admin.customers.addEmergencyDetail', [
    //             'user' => $user,
    //             'emergencyActive' => 'active'
    //         ]);

    //     }
 }



public function update(Request $request, $id=null)
{
    $request->validate([
        'emergency_contact_name' => 'required|string|max:255',
        'emergency_contact_relation' => 'required|string|max:255',
        'emergency_contact_number' => 'required|string|max:20',
    ]);
    $emergencyContact = EmergencyContact::find($request->id);
    if (!$emergencyContact){
        return redirect()->back()->with('error', 'Emergency contact not found.');
    }

    $emergencyContact->name = $request->emergency_contact_name;
    $emergencyContact->relation = $request->emergency_contact_relation;
    $emergencyContact->contact_number = $request->emergency_contact_number;
    $emergencyContact->save();
    $emergencycontact = EmergencyContact::where('user_id', $request->user_id)->get();
    $user = User::findOrFail($request->id);
    return view('admin.customers.viewEmergencyDetail', [
        'success' => "Emergency contact detail updated successfully",
        'user' => $user,
        'emergencycontacts' => $emergencycontact,  // Use the correct plural variable name here
        'emergencyActive' => 'active'
    ]);

}





    public function destroy($id)
    {

        $data = EmergencyContact::find($id);
        if ($data) {
            $user = User::find($data->user_id);

            $data->delete();

            return redirect()->back()->with([
                'success' => 'Emergency Contact deleted successfully.',
                'user' => $user
            ]); } else {

            return redirect()->back()->with('error', 'Emergency Contac not found.');
        }
    }


}
