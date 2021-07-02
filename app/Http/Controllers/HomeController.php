<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Profile::where('user_id', '=', Auth::user()->id)->first();
        if($user === null){

            return redirect()->route('profile.create')->with('message', 'Kindly create your personal information');
            
        }
        return view('pages.resident.dashboard.index');
    }
}
