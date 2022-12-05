<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Coffee;

class CoffeeController extends Controller
{
    /**
    * Coffee View anzeigen
    *
    * [products] - auf Coffee Model zugreifen und Daten aus DB coffees auslesen
    * @return  view
    */

    public function index(){
        
        $products = Coffee::all();
        return view('shop.coffee',compact('products'));
    }
}
