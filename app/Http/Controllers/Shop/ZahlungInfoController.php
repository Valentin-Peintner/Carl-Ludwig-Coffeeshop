<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

class ZahlungInfoController extends Controller
{
    /**
    * Zahlungsinfo view wird aufgerufen
    *
    * @return view
    */

    public function index(){
        
        return view('shop.zahlung-info');
    }
}
