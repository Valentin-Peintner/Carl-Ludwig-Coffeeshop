<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Equipment;

class EquipmentController extends Controller
{
     /**
     * Anzeigen von Equipment view
     *
     * [products] - auf Equipment Model zugreifen und Daten aus DB auslesen
     * @return  view
     */

    public function index(){
        
        $products = Equipment::all();
        
        return view('shop.equipment',compact('products'));
    }
}
