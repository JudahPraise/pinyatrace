<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TravelHistoryController extends Controller
{
    public function index()
    {
        return view('pages.resident.travel.index');
    }
}
