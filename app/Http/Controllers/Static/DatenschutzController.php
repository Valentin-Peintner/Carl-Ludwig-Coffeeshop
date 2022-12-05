<?php

namespace App\Http\Controllers\Static;

use App\Http\Controllers\Controller;

class DatenschutzController extends Controller
{
     /**
     * Datenschutz view anzeigen
     *
     * @return view
     */

    public function index()
    {
        return view('static.datenschutz');
    }
}
