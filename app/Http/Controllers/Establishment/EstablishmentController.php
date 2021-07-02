<?php

namespace App\Http\Controllers\Establishment;

use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EstablishmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:establishment');
    }

    public function index()
    {
        $est = Information::where('est_id', '=', Auth::guard('establishment')->user()->id)->first();
        if($est === null){

            return redirect()->route('information.create')->with('message', 'Kindly create your company information');

        }
        return view('pages.establishment.dashboard.index');
    }
}
