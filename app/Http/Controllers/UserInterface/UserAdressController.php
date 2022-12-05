<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use App\Models\Adress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAdressController extends Controller
{
    /**
     * Adresse View wird aufgerufen
     * [user]     Aktuell eingeloggter User wird ermittelt
     * [adresses] Über diese Variable wird die aktuelle Adresse des Users ausgelesen 
     *
     * @return  view 
     */
    public function index(){

        $users = Auth::user();
        $adresses = Adress::find($users);

        return view('Userinterface.adress',compact('users', 'adresses'));
    }


    /**
     * Update User Adresse
     *
     * @param   Request  $request  Daten aus Session
     * [data]   Validierung der Input Felder und dessen Inhalt
     * [adress] eigegebene Daten werden in dieser Variable gespeichert und per save in DB adresses überschrieben
     *
     * @return view
     */
    public function update(Request $request){

        $data = $request->all();

        // Validierung
        $data = $this->validate($request,[
            'street' => 'min:2|max:50|required',
            'number' => 'numeric|required',
            'city' => 'min:2|required',
            'zip' => 'min:2|numeric|required',
            'country' => 'required'
        ]);
       
        // Adresse updaten
        $user = Auth::user();
        $adress = Adress::find($user->id);

        $adress->street = $data['street'];
        $adress->number = $data['number'];
        $adress->city = $data['city'];
        $adress->zip = $data['zip'];
        $adress->country_id = $data['country'];

        $adress->save();

        return redirect()->route('adress')->with('message','Adresse erfolgreich geändert!');
    }

}
