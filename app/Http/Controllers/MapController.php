<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Map投稿画面を表示
     * 
     * @param 
     * @return \Illuminate\View\View
     */
    public function createMap()
    {
        $pin = new Pin();
        $pins = $pin->getPins();
        
        return view("map", compact('pins'));
    }
}
