<?php

namespace App\Http\Controllers\ContactTracer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Cases extends Controller
{
    public function index(){
        return view('pages.contact_tracer.cases.index');
    }
}
