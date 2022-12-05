<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

class ImpressumShopController extends Controller
{

    /**
     * Impressum View anzeigen
     *
     * @return view
     */

    public function index()
    {
        return view('shop.impressum-shop');
    }
}
