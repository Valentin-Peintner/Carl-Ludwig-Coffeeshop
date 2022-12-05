<?php

namespace App\Http\Controllers\Static;

use App\Http\Controllers\Controller;

class AboutusController extends Controller
{
    /**
    * Anzeigen von About Us View
    *
    * @return  view
    */
    
    public function index()
    {
        return view('static.about-us');
    }
}
