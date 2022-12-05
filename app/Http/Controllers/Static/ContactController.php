<?php

namespace App\Http\Controllers\Static;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    /**
     * Contact view anzeigen
     *
     * @return view
     */
    public function index()
    {
        return view('static.contact');
    }

    /**
     * Validierung Kontakt Email
     *
     * @param   Request Daten aus dem Formular an Mailtrap übermitteln
     *
     * @return   wird bei submit wieder auf Kontaktseite zurückgeleitet
     */

    public function send(Request $request)
    {
        // Validierung
        $validator = Validator::make($request->all(), [
            'message' => ['string', 'min:5', 'max:500', 'required'],
            'email' => ['email', 'required'],
            'name' => ['string', 'min:2', 'max:20', 'required'],
            'phone' => ['numeric', 'required'],
        ]);

        // Wenn Validierung fehl schlägt
        if($validator->fails()) {
            abort(403);
        }

        // Welche Felder ausgewählt werden
        $data = $request->only('message', 'email', 'name', 'phone');

        // Empfänger Email
        $email = "carlludwig@cafe.at";

        // Was vom Formular in Email stehen soll & email senden
        Mail::send('mail.mail',
        [
            'text' => $data['message'],
            'phone' => $data['phone'], 
            'name' => $data['name']
        ], 

        function($message) use( $email, $data) {
            $message->to($email, 'Carl Ludwig')
                ->subject('New mail from contact form');
            $message->from($data['email'], $data['name']);
         });

        // Flash Message
        return redirect()->route('contact.index')->with('message', 'Vielen Dank, wir haben Ihre Email erhalten!');
    }
}
