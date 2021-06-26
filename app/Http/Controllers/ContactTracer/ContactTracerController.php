<?php

namespace App\Http\Controllers\ContactTracer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactTracerController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:contact_tracer');
    // }

    public function index(){
        return view('pages.contact_tracer.dashboard.index');
    }
}
