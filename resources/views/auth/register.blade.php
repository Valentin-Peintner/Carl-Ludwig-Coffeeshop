@section('pageTitle', 'Registrierung')

<x-guest-layout>
    <x-auth-card>
        {{-- header --}}
        <x-slot name="logo">
                <x-application-logo class=""/>
        </x-slot>

        {{-- Trenn element --}}
        <div class="register-box"></div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="error" :errors="$errors" />

        <div id="body-signup">
            <div class="container-signup">

                {{-- Registrierung form --}}
                <form method="POST" action="{{ route('register') }}" >
                    @csrf

                    <div class="signup-details">
                        <!-- Gender -->
                        <div class="input-box">
                            <x-label for="male" :value="__('Anrede')" class="details" />
                            <select name="gender" id="gender">
                                <option value="male">Herr</option>
                                <option value="female">Frau</option>
                                <option value="other">Divers</option>
                            </select>
                        </div>

                        <!-- Straße -->
                        <div class="input-box">
                            <x-label class="details" for="street" :value="__('Straße')" />
                            <x-input id="street" type="text" name="street"  autofocus />
                        </div>
            
                        <!-- Vorname -->
                        <div class="input-box">
                            <x-label for="name" :value="__('Vorname')" class="details"/>
                            <x-input id="name" class="" type="text" name="firstname" :value="old('first_name')" required autofocus />
                        </div>

                        <!-- nummer -->
                        <div class="input-box">
                            <x-label class="details" for="number" :value="__('Nummer')" />
                            <x-input id="number" type="numeric" name="number"  
                            autofocus />
                        </div>

                        <!-- Nachname -->
                        <div class="input-box">
                            <x-label for="lastname" :value="__('Nachname')" class="details" />
                            <x-input id="lastname" class="" type="text" name="lastname" :value="old('last_name')" required autofocus />
                        </div>
                        
                        <!-- Ort-->
                        <div class="input-box">
                            <x-label class="details" for="city" :value="__('Ort')" />
                            <x-input id="city" type="text" name="city"
                                autofocus />
                        </div>
            
                        <!-- Email -->
                        <div class="input-box">
                            <x-label for="email" :value="__('Email')" class="details"/>
                            <x-input id="email" class="" type="email" name="email" :value="old('email')" required />
                        </div>
                    
                        <!-- PLZ -->
                        <div class="input-box">
                            <x-label class="details" for="zip" :value="__('Postleitzahl')" />
                            <x-input id="zip" type="numeric" name="zip" autofocus />
                        </div>

                        <!-- Passwort -->
                        <div class="input-box">
                            <x-label for="password" :value="__('Passwort')" class="details"/>
                            <x-input id="password" type="password" name="password"
                            required autocomplete="new-password" />
                        </div>

                        <!-- Land -->
                        <div class="input-box">
                            <x-label class="details select" for="country" :value="__('Land')" />
                                <select name="country" id="country"  autofocus>
                                    <option value="1"> Österreich</option>             
                                    <option value="2"> Deutschland</option>
                                    <option value="3"> Schweiz</option>
                                </select>        
                            </div>     

                        <!-- Passwort bestätigen -->
                        <div class="input-box">
                            <x-label for="password_confirmation" :value="__('Passwort bestätigen')" class="details" />
                            <x-input    id="password_confirmation"
                                        type="password"
                                        name="password_confirmation" required />
                        </div>
                    </div>

                    {{-- Falls Account vorhanden --}}
                    <div class="exists">
                        <a class="" href="{{ route('login') }}">
                            {{ __('Du hast bereits einen Account?') }}
                        </a>
                    </div>

                    {{-- Registrier Button --}}
                    <div id="btn-register">     
                        <x-button class="btn-register">
                            {{ __('Registrieren') }}
                        </x-button>            
                    </div>

                    </div>
                </div>
            </form>
        </div>   
    </x-auth-card>
</x-guest-layout>
