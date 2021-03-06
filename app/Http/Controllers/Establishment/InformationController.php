<?php

namespace App\Http\Controllers\Establishment;

use App\Models\Information;
use Illuminate\Http\Request;
use App\Models\Establishment;
use App\Models\Representative;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public function index()
    {   
        $company = Establishment::where('id','=',Auth::guard('establishment')->user()->id)->with('information', 'representative')->first();
        
        if($company === null){
            return redirect()->route('establishment.create')->with('message', 'Kindly create your personal information');
        }
        return view('pages.establishment.information.index', compact('company'));
    }

    public function create()
    {
        return view('pages.establishment.information.create');
    }

    public function store(Request $request)
    {
        try {
            $words = preg_split("/[\s,_-]+/", $request->company_name);
            $acronym = "";
                
            foreach ($words as $w) {
              $acronym .= $w[0];
            }

            // dd($acronym);

            Information::create([
                'est_id' => Auth::guard('establishment')->user()->id,
                'company_name' => $request->company_name,
                'acronym' => $acronym.Auth::guard('establishment')->user()->id,
                'cp_number' => $request->cp_number,
                'tel_number' => $request->tel_number,
                'company_address' => $request->company_address
            ]);

            Representative::create([
                'est_id' => Auth::guard('establishment')->user()->id,
                'name' => $request->name,
                'number' => $request->number,
                'address' => $request->address,
                'email' => $request->email,
                'position' => $request->position
            ]);

            return redirect()->route('information')->with('success', 'Company information saved successfully');
        } 
        catch (\Illuminate\Database\QueryException $exception) {
       
            $errorInfo = $exception->errorInfo;
       
            return dd($errorInfo);
       
        }
    }

    public function update(Request $request, $id)
    {
        try {

            Information::where('est_id','=',$id)->update([
                'est_id' => Auth::guard('establishment')->user()->id,
                'company_name' => $request->company_name,
                'cp_number' => $request->cp_number,
                'tel_number' => $request->tel_number,
                'company_address' => $request->company_address
            ]);

            Representative::where('est_id','=',$id)->update([
                'est_id' => Auth::guard('establishment')->user()->id,
                'name' => $request->name,
                'number' => $request->number,
                'address' => $request->address,
                'email' => $request->email,
                'position' => $request->position
            ]);

            return redirect()->route('information')->with('update', 'Company information updated successfully');
        } 
        catch (\Illuminate\Database\QueryException $exception) {
       
            $errorInfo = $exception->errorInfo;
       
            return dd($errorInfo);
       
        }
    }
}
