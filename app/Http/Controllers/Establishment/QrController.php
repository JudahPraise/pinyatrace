<?php

namespace App\Http\Controllers\Establishment;

use Illuminate\Http\Request;
use App\Models\Establishment;
use App\Models\TravelHistory;
use Illuminate\Support\Carbon;
use App\Models\HealthDeclaration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function in($id)
    {

        $establishment = Establishment::where('id','=',$id)->with('information')->first();
        $dateTime = Carbon::now()->isoFormat('dddd D, YYYY - hh:mm a');

        TravelHistory::create([
            'user_id' => Auth::user()->id,
            'res_name' => Auth::user()->profile->getFullname(),
            'date' =>  Carbon::now()->format('Y-m-d'),
            'in'   => Carbon::now()->format('h:m'),
            'establishment_id' => $establishment->id,
            'establishment_name' => $establishment->information->company_name,
            'establishment_address' => $establishment->information->company_address
        ]);
        
        return redirect()->route('has.scanned', $id)->with('health', 'Kindly answer this health declaration form')->with(compact(['establishment', 'dateTime']));
        // return view('pages.resident.qr-code.scanner', )->with('show');
    }

    public function out($id)
    {
        $travel = TravelHistory::where('out','=',null)->orWhere('establishment_id','=',$id)->orWhere('user_id','=',Auth::user()->id)->latest()->first();

        $travel->update([
            'out' => Carbon::now()->format('h:m')
        ]);

        return redirect()->route('scanner')->with('out', sprintf('Thank you for visiting %s', $travel->establishment_name));
    }

    public function healthStore(Request $request, $id)
    {   

        if($request->temp >= 37.5){

            return redirect()->back()->with('danger', sprintf("You're temperature is %s", $request->temp));

        }
        elseif($request->q1 === 'Yes'){

            return redirect()->back()->with('danger', sprintf("You answered 'YES' in one of the questions"));

        }
        elseif($request->q2 === 'Yes'){

            return redirect()->back()->with('danger', sprintf("You answered 'YES' in one of the questions"));


        }
        elseif($request->fever === 'Yes'){

            return redirect()->back()->with('danger', sprintf("You answered 'YES' in one of the questions"));


        }
        elseif($request->cough === 'Yes'){

            return redirect()->back()->with('danger', sprintf("You answered 'YES' in one of the questions"));


        }
        elseif($request->runny_nose === 'Yes'){

            return redirect()->back()->with('danger', sprintf("You answered 'YES' in one of the questions"));


        }
        elseif($request->sore_throat === 'Yes'){

            return redirect()->back()->with('danger', sprintf("You answered 'YES' in one of the questions"));


        }
        elseif($request->shortness_of_breath === 'Yes'){

            return redirect()->back()->with('danger', sprintf("You answered 'YES' in one of the questions"));

        }
        else{

            HealthDeclaration::create([
                'est_id' => $id,
                'user_id' => Auth::user()->id,
                'temp' => $request->temp,
                'q1' => $request->q1,
                'q2' => $request->q2,
                'fever' => $request->fever,
                'cough' => $request->cough,
                'runny_nose' => $request->runny_nose,
                'sore_throat' => $request->sore_throat,
                'shortness_of_breath' => $request->shortness_of_breath
            ]);

            return redirect()->back()->with('enter', 'You may enter!');
        }
    }
}
