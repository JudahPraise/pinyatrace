<?php

namespace App\Http\Controllers\Establishment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function index(){
        return view('pages.establishment.dashboard.index');
    }
}
