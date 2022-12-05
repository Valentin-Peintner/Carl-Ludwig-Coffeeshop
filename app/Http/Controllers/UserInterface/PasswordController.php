<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Passwort view anzeigen
     *
     * @return  view
     */
    public function index(){

        return view('UserInterface.change-password');
    }

    /**
     * Update User Passwort
     *
     * @param   Request  $request  Daten aus Session
     * [request]   Validierung der Input Felder und dessen Inhalt
     * [request->old_password] Es wird überprüft ob das alte Passwort mit der Eingabe übereinstimmt
     * [request->new_password] Neues Passwort wird per hash verschlüsselt und in DB per update geändert
     *
     * @return view
     */
    public function update(Request $request){

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        
        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("message", "Altes Passwort stimmt nicht überein!");
        }
    
        #Update the new Password - Passwort wird gehashed
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('change-password')->with("message", "Passwort erfolgreich geändert!");
    }
}
