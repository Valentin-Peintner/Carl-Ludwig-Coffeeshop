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

        <!-- Validation Errors -->
        <x-auth-validation-errors class="error" :errors="$errors" />

            <form method="POST" action="{{ route('password.update') }}" id="pw-reset">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email -->
                <div class="reset">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                </div>

                <!-- Passwort -->
                <div class="reset">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" type="password" name="password" required />
                </div>

                <!-- Passwort bestätigen -->
                <div class="reset">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-input    id="password_confirmation" 
                                type="password"
                                name="password_confirmation" required />
                </div>

                {{-- Reset Button --}}
                <div id="btn-reset">
                    <x-button class="btn-reset">
                        {{ __('Passwort zurücksetzen') }}
                    </x-button>
                </div>
            </form>
    </x-auth-card>
</x-guest-layout>
