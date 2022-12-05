
@section('pageTitle', 'Dashboard | Adresse')

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
                <p class="title">{{__('Adresse')}}</p>
                
                    {{-- Formular zum updaten der Adresse --}}
                    <form action="{{route('adress.update')}}" method="POST" novalidate>
                        @csrf
                        @method('PUT')

                            @foreach ($adresses as $adress)   
                            <div class="user-details">

                                <!-- street -->
                                <div class="input-box">
                                    <x-label class="details" for="street" :value="__('Straße')" />
                                    <x-input id="street" type="text" name="street" :value="($adress->street)" autofocus />
                                </div>
                                   
                                <!-- number -->
                                <div class="input-box">
                                    <x-label class="details" for="number" :value="__('Nummer')" />
                                    <x-input id="number" type="numeric" name="number" :value="($adress->number)"  
                                    autofocus />
                                </div>
    
                                <!-- City-->
                                <div class="input-box">
                                    <x-label class="details" for="city" :value="__('Ort')" />
                                    <x-input id="city" type="text" name="city" :value="($adress->city)" 
                                        autofocus />
                                </div>
    
                                <!-- zip -->
                                <div class="input-box">
                                    <x-label class="details" for="zip" :value="__('Postleitzahl')" />
                                    <x-input id="zip" type="numeric" name="zip" :value="($adress->zip)" autofocus />
                                </div>
                           
                                <!-- country-->
                                <div class="input-box">
                                    <x-label class="details select" for="country" :value="__('Land')" />
                                        <select name="country" id="country"  autofocus>

                                            @if ($adress->Country->country == 'Österreich')
                                                <option value="1"> {{$adress->Country->country}}</option>
                                                <option value="2"> Deutschland</option>
                                                <option value="3"> Schweiz</option>

                                            @elseif ($adress->Country->country == 'Deutschland')
                                                <option value="2"> {{$adress->Country->country}}</option>
                                                <option value="1"> Österreich</option>
                                                <option value="3"> Schweiz</option>
                                            @else
                                                <option value="3"> {{$adress->Country->country}}</option>
                                                <option value="1"> Österreich</option>
                                                <option value="2"> Deutschland</option>
                                            @endif                                 
                                        </select>        
                                </div>     
                            @endforeach
                        
                            {{-- Erfolgs Message --}}
                            @if(session()->has('message'))
                                <div class="success-message"> 
                                {{ session()->get('message') }}
                                </div>
                            @else
                            
                            {{-- Validation Errors --}}
                            <x-auth-validation-errors class="error-adress" :errors="$errors" />
                            @endif
                            </div>

                            <x-button class="btn-update">
                                {{__('Aktualisieren')}}
                            </x-button>  
                    </form>                     
                </div>
             </div>
    </x-slot>     
</x-app-layout>
