<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteConroller extends Controller
{
    //

    public function home()
    {
        return view('home');
    }

    public function form()
    {
        return view('form');
    }

    public function catalog()
    {
        return view('catalog');
    }

    public function product()
    {
        return view('product');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function edit()
    {
        return view('edit');
    }
}
