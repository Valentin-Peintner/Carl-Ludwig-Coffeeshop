
@section('pageTitle', 'Dashboard')

<x-app-layout>
    {{-- Header --}}
    <x-slot name="header">
        <div>
            <x-application-logo/> 
        </div>
    </x-slot>

    <!-- Navigation Links -->
    <x-slot name="nav">
        @include('layouts.navigation')
    </x-slot>

    <x-slot name="body">
        <div id="body-profile">     
            <div class="container-dashboard">

                {{-- Begrüßung --}}
                <div class="title">
                    <h2>Hallo, {{ Auth::user()->firstname }} !</h2>
                    <p>Das ist dein Dashboard</p>
                </div>
        
                <div class="dashboard-details">
                    <div class="dashboard-content">

                        {{-- Linkes Div --}}
                        <span class="head">{{__('Persönliche Daten')}}</span>

                            <div class="text-info">
                                @if (Auth::user()->gender == 'male' || Auth::user()->gender == 'Male')
                                    <p> Herr {{ Auth::user()->firstname }} {{Auth::user()->lastname}} </p>

                                @elseif (Auth::user()->gender == 'female' || Auth::user()->gender == 'Female')
                                    <p> Frau <br> {{ Auth::user()->firstname }}  {{Auth::user()->lastname}} </p>

                                @else
                                    <p> {{ Auth::user()->firstname }} {{Auth::user()->lastname}} </p>

                                @endif 
                                    <p>{{ Auth::user()->email }}</p>
                            </div>
                    </div>
                    <div class="dashboard-content">

                        {{-- Rechtes Div --}}
                        <span class="head">{{__(' Aktuelle Anschrift')}}</span>
                            <div class="text-info">
                                @foreach ($adresses as $adress)  

                                <p>{{$adress->street}} {{$adress->number}}</p> 
                                <p>{{$adress->zip}} {{$adress->city}}</p>            
                                <p>{{$adress->Country->country}}</p> 

                                @endforeach

                            </div>
                    </div>             
                </div>
            </div>
        </div>
    </x-slot>        
</x-app-layout>
