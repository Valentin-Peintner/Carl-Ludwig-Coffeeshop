
@section('pageTitle', 'Dashboard | Profil')

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

                <p class="title">{{__('Profil')}}</p>

                    {{-- Formular zum updaten von User Profil --}}
                    <form method="POST" action="{{route('profile.update')}}" novalidate>

                        @method('PUT')
                        @csrf
                
                        <div class="user-details">

                            <!-- Firstname -->
                            <div class="input-box">     
                                <x-label class="details" for="firstname" :value="__('Vorname')" />     
                                <x-input id="firstname" type="text" name="firstname" :value="(Auth::user()->firstname)" placeholder="Ihr Vorname" autofocus />
                            </div>

                            <!-- Email-->
                            <div class="input-box">
                                <x-label class="details" for="email" :value="__('Email')" />
                                <x-input id="email" type="email" name="email" :value="(Auth::user()->email)" autofocus />
                            </div>

                            <!-- Lastname -->
                            <div class="input-box">  
                                <x-label class="details" for="lastname" :value="__('Nachname')" />                    
                                <x-input id="lastname" type="text" name="lastname" :value="(Auth::user()->lastname)" 
                                placeholder="Ihr Nachname" autofocus />
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
                            {{__('Aktualisiern')}}
                        </x-button>
                
                    </form>
            </div>
        </div>
    </x-slot>       
</x-app-layout>
