<?php

namespace App\Http\Controllers\Establishment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Information extends Controller
{
    public function index(){
        return view('pages.establishment.information.index');
    }
}
