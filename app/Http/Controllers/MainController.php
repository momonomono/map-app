<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function top()
    {
        return view("top");
    }

    public function createPin()
    {
        return view("pin");
    }

    public function storePin(Request $request)
    {
        $pin = $request->validation([
            "title" => "required|string|max:255",
            "map_url" => "required|string|max:255",
            "detail" => "nullable|string|max:255",
        ]);

        


    }

    public function createMap()
    {
        return view("map");
    }

    public function list()
    {
        return view("list");
    }
}
