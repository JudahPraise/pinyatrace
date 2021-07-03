<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScannerController extends Controller
{
    public function index(){

        return view('pages.resident.qr-code.scanner');
    }

    public function camera()
    {
        return view('pages.resident.qr-code.camera');
    }
}
