<?php

namespace App\Http\Controllers\Resident;

use App\Models\User;
use App\Models\Contact;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $resident = User::where('id','=',Auth::user()->id)->with('profile', 'contact')->first();

       if($resident === null){
        return redirect()->route('profile.create')->with('message', 'Kindly create your personal information');
       }

       return view('pages.resident.profile.index', compact('resident'));
    }

    public function create()
    {
        return view('pages.resident.profile.create');
    }

    public function store(Request $request)
    {
        try {
            Profile::create([
                'user_id' => Auth::user()->id,
                'first_name' => $request->first_name,
                'surname' => $request->surname,
                'middle_name' => $request->middle_name,
                'dob' => $request->dob,
                'age' => $request->age,
                'sex' => $request->sex,
                'address' => $request->address,
                'cp_number' => $request->cp_number
            ]);
    
            Contact::create([
                'user_id' => Auth::user()->id,
                'emergency_contact' => $request->emergency_contact,
                'relationship' => $request->relationship,
                'ec_cp_number' => $request->ec_cp_number
            ]);
    
            return redirect()->route('profile')->with('success', 'Profile saved!');

        } catch (\Illuminate\Database\QueryException $exception) {

            $errorInfo = $exception->errorInfo;

            return dd($errorInfo);

        }
    }

    public function update(Request $request, $id)
    {
        try {
            Profile::where('user_id','=',$id)->update([
                'user_id' => Auth::user()->id,
                'first_name' => $request->first_name,
                'surname' => $request->surname,
                'middle_name' => $request->middle_name,
                'dob' => $request->dob,
                'age' => $request->age,
                'sex' => $request->sex,
                'address' => $request->address,
                'cp_number' => $request->cp_number
            ]);
    
            Contact::where('user_id','=',$id)->update([
                'user_id' => Auth::user()->id,
                'emergency_contact' => $request->emergency_contact,
                'relationship' => $request->relationship,
                'ec_cp_number' => $request->ec_cp_number
            ]);
    
            return redirect()->route('profile')->with('update', 'Profile updated!');

        } catch (\Illuminate\Database\QueryException $exception) {

            $errorInfo = $exception->errorInfo; 

            return dd($errorInfo);

        }
    }
}
