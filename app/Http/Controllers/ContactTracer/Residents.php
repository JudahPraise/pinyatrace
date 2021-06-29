<?php

namespace App\Http\Controllers\ContactTracer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Residents extends Controller
{
    public function index(){
        return view('pages.contact_tracer.residents.index');
    }
}
