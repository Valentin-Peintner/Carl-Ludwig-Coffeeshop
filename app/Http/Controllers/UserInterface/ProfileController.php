<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    /**
     *  Profil view wird aufgerufen
     *
     * @return  view
     */
    public function index(){

        return view('UserInterface.profile');
    }

    /**
     * Update User Daten
     *
     * @param   Request  $request Daten aus Session
     * [data]   Validierung der Input Felder und dessen Inhalt
     * [userupdate] eigegebene Daten werden in dieser Variable gespeichert und per save in DB users überschrieben
     *
     * @return view
     */
    public function update(Request $request){

        $data = $this->validate($request,[
            'firstname' => 'min:2|max:50|required',
            'lastname' => 'min:2|max:50|required',
            'email' => 'min:5|email|required', 
        ]);
    
        $user = Auth::user();
        $userupdate = User::find($user->id);

        $userupdate->firstname = $request['firstname'];
        $userupdate->lastname = $request['lastname'];
        $userupdate->email = $request['email'];

        // speichern
        $userupdate->save();

        return redirect()->route('profile')->with('message','Profil erfolgreich geändert!');
    }
}
