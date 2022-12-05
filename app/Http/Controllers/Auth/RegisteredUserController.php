<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Adress;
use App\Models\Country;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Stripe\Customer;
use Stripe\Stripe;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:male,female,other'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'street' => 'min:2|max:50|required',
            'number' => 'numeric|required',
            'city' => 'min:2|required',
            'zip' => 'min:2|numeric|required',
         
        ]);
        
        // User erstellen
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Adresse erstellen
        $country = Country::find($request->country);
        
        $adress = Adress::create([
            'user_id' => $user->id,
            'country_id' => $country->id,
            'street' => $request->street,
            'number' => $request->number,
            'city' => $request->city,
            'zip' => $request->zip,
        ]);

           
        event(new Registered($user,$adress));

        Auth::login($user, $adress,);

        return redirect(RouteServiceProvider::HOME);
    }
}
