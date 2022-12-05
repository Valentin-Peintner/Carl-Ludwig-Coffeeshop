<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;


class AgbController extends Controller
{
    /**
    * Agb View anzeigen
    *
    * @return  view
    */

    public function index()
    {
        return view('shop.agb-shop');
    }
}
