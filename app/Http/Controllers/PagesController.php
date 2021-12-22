<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function getZoneControllerView() {

        return view('zone.indexZone');

    }
}
