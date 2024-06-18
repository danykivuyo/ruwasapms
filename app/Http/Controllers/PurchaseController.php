<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    //
    public function purchase() {
        return view('purchase');
    }

    public function history () {
        return view('purchase-history');
    }
}
