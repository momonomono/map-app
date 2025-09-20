<?php

namespace App\Http\Controllers;


class MainController extends Controller
{
    /**
     * トップページを表示
     *
     * @param 
     * @return \Illuminate\View\View
     */
    public function top()
    {
        return view("top");
    }

    public function list()
    {
        return view("list");
    }
}
