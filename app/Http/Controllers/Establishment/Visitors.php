<?php

namespace App\Http\Controllers\Establishment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Visitors extends Controller
{
    public function index(){
        return view('pages.establishment.visitors.index');
    }
}
