<?php

namespace App\Http\Controllers\Static;

use App\Http\Controllers\Controller;

class ImpressumController extends Controller
{
    /**
     * Impressum view anzeigen
     *
     * @return view
     */
    
    public function index()
    {
        return view('static.impressum');
    }
}
