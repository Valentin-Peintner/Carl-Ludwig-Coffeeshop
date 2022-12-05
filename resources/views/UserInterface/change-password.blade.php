
@section('pageTitle', 'Dashboard | Passwort')

<x-app-layout>
    {{-- Header --}}
    <x-slot name="header">
        <div>
            <x-application-logo/> 
        </div>
    </x-slot>

    <!-- Navigation Links -->
    <x-slot name="nav" id="nav">
        @include('layouts.navigation')
    </x-slot>

    <x-slot name="body">
        <div id="body-profile">
            <div class="container-profile">
                 <p class="title">{{__('Password ändern')}}</p>

                    {{-- Formular zum updaten des Passworts --}}
                    <form method="POST" action="{{route('update-password')}}" novalidate>
                        @method('PUT')
                        @csrf
                
                        <div class="user-details">
                            <!-- New Password -->
                            <div class="input-box">
                                <x-label class="details" for="newPasswordInput" :value="__('Neues Passwort')" />
                                <x-input    id="newPasswordInput" 
                                            type="password" 
                                            name="new_password" 
                                            autocomplete="new_password"
                                            placeholder="Neues Passwort" autofocus/>
                            </div>
                                
                            <!-- Old Password -->
                            <div class="input-box">     
                                <x-label class="details" for="oldPasswordInput" :value="__('Altes Password')" />     
                                <x-input    id="old_password" 
                                            type="password" 
                                            name="old_password"  
                                            placeholder="Altes Passwort" autofocus />
                            </div>

                            <!-- Confirm Password -->
                            <div class="input-box">
                                <x-label class="details" for="confirmNewPasswordInput" :value="__('Passwort bestätigen')" />
                                <x-input    id="confirmNewPasswordInput" 
                                            type="password" 
                                            name="new_password_confirmation" 
                                            autocomplete="new_password_confirmation"
                                            placeholder="Neues Passwort bestätigen" autofocus/>
                            </div>

                            {{-- Erfolgs Message --}}
                            @if(session()->has('message'))
                                <div class="success-message"> 
                                {{ session()->get('message') }}
                                </div>
                            @else

                            {{-- Validation Errors  --}}
                            <x-auth-validation-errors class="error-adress" :errors="$errors" />

                            @endif
                        </div>   
                        
                        <x-button  class="btn-update">
                            {{__('Aktualisieren')}}
                        </x-button>         
                 </form>
            </div>
        </div>
    </x-slot>       
</x-app-layout>
