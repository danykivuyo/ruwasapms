<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeterController extends Controller
{
    //
    public function meters($type = null)
    {
        return view('meters');
    }

    public function meters_register()
    {
        return view('meters-register');
    }

    public function meter()
    {
        return view('meter');
    }
}
