<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CbwsoController extends Controller
{
    //
    public function index()
    {
        return view('cbwsos');
    }

    public function register() {
        return view('cbwso-register');
    }
}
