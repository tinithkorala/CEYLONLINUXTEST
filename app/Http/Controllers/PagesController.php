<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
    }
    
    public function getZoneControllerView() {

        return view('zone.indexZone');

    }
}
