<?php

namespace App\Http\Controllers\Establishment;

use Illuminate\Http\Request;
use App\Models\TravelHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Visitors extends Controller
{
    public function index()
    {
        $visitors = TravelHistory::where('establishment_id','=',Auth::guard('establishment')->user()->id)->orderBy('updated_at','DESC')->paginate(10);
        return view('pages.establishment.visitors.index', compact('visitors'));
    }
}
       