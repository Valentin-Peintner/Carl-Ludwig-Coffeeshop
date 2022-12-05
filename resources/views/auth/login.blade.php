@section('pageTitle', 'Login')

<x-guest-layout>
    <x-auth-card>
        {{-- header --}}
        <x-slot name="logo">   
                <x-application-logo/> 
        </x-slot>
        {{-- trenn element  --}}
        <div class="login-box">
                <a href="/index-shop">Zurück zum Shop</a>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="error" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="error" :errors="$errors" />

        {{-- login form --}}
        <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf

            <!-- Email Address -->
            <div class="login">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="login">
                <x-label for="password" :value="__('Passwort')" />
                <x-input    id="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            </div>

            {{-- Passwort vergessen --}}
            <div class="l-password-f">
                @if (Route::has('password.request'))
                    <a class="forgot_password" href="{{ route('password.request') }}">
                        {{ __('Passwort vergessen?') }}
                    </a>
                @endif
            </div>

            {{-- login button --}}
            <div id="btn-login">
                <x-button class="btn-login">
                    {{ __('Einloggen') }}
                </x-button>
            </div>

            {{-- kein Account, leitet zu registrierungs view weiter --}}
            <div class="l-register">
                <p>Du hast noch keinen Account?</p>
                    @if (Route::has('register'))
                        @auth
                            @else
                                <a href="{{ route('register') }}">Sign up <a>        
                        @endauth
                    @endif
            </div>
        </form>    
    </x-auth-card>
</x-guest-layout>
