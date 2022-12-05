<?php

namespace App\Http\Controllers\Userinterface;

use App\Http\Controllers\Controller;
use App\Models\Adress;

class DashboardController extends Controller
{
    /**
     * Dashboard view anzeigen
     * @param [user] - auf Daten von akutell eingeloggten zugreifen
     *        [adresses] - auf Adress Model zugreifen und passende Adresse von $user auslesen
     * 
     * @return view
     */ 

    public function index(){

        $user = auth()->user();
        $adresses = Adress::find($user);

        return view('UserInterface.dashboard',compact('adresses'));
        
    }
}
