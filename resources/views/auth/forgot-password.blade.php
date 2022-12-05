@section('pageTitle', 'Passwort vergessen')

<x-guest-layout>
    <x-auth-card>
        {{-- header --}}
        <x-slot name="logo">
                <x-application-logo/>
        </x-slot>

        {{-- trenn element --}}
        <div class="reset-box">
            <a href="/login">Zurück zum Login</a>
        </div>

        {{-- Text  --}}
        <div class="forgot-text">
            {{ __('Passwort vergessen? Gib deine Email an und wir senden die einen Link zum zurücksetzten.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="error" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="error" :errors="$errors" />

            <form method="POST" action="{{ route('password.email') }}" id="pw-reset">
                @csrf

                <!-- Email -->
                <div class="reset">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                {{-- Reset Button --}}
                <div id="btn-reset">
                    <x-button class="btn-reset">
                        {{ __('Zurücksetzen') }}
                    </x-button>
                </div>
            </form>
    </x-auth-card>
</x-guest-layout>
