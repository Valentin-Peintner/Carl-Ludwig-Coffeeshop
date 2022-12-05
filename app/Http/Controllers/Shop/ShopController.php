<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Coffee;

class ShopController extends Controller
{
    /**
     * Shop view anzeigen
     *
     * [products] - auf Coffee Model zugreifen und Daten aus DB auslesen
     * @return  view 
     */

    public function index()
    {
        $products = Coffee::all();
        
        return view('shop.index-shop',compact('products'));
    }
}
