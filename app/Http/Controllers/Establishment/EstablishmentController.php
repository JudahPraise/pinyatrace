<?php

namespace App\Http\Controllers\Establishment;

use App\Models\CovidCase;
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
        $cases = CovidCase::all();
        $top = CovidCase::select('address')->where('status','=','Positive')
        ->selectRaw('COUNT(*) AS count')
        ->groupBy('address')
        ->orderByDesc('count')
        ->limit(5)
        ->get();
        $active = $cases->where('status', 'Positive')->count();
        $recovered = $cases->where('status', 'Recovered')->count();
        $mortality = $cases->where('status', 'Died')->count();
        $total = $cases->count();

        $est = Information::where('est_id', '=', Auth::guard('establishment')->user()->id)->first();
        if($est === null){
            return redirect()->route('information.create')->with('message', 'Kindly create your company information', compact(['cases', 'active', 'recovered', 'mortality', 'total', 'top']));
        }

        return view('pages.establishment.dashboard.index', compact(['cases', 'active', 'recovered', 'mortality', 'total', 'top']));
    }
}
