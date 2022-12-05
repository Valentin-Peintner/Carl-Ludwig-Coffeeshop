<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

class DatenschutzShopController extends Controller
{
    /**
     * Datenschutz view anzeigen
     *
     * @return view
     */

    public function index()
    {
        return view('shop.datenschutz-shop');
    }
}
