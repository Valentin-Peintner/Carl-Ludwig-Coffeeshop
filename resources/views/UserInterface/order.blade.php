@section('pageTitle', 'Dashboard | Bestellungen')

<x-app-layout>
    {{-- Header --}}
    <x-slot name="header">
        <div>
            <x-application-logo/> 
        </div>
    </x-slot>

    <x-slot name="nav" id="nav">
        <!-- Navigation Links -->
        @include('layouts.navigation')
    </x-slot>
        <x-slot name="body">
            <div id="body-profile">
                <div class="container-order">
                    <p class="title"> {{__('Bestellungen')}} </p>

                        {{-- Tabelle als Bestellübersicht --}}
                        <table class="table-order">
                            <thead class="table-top">
                                <tr>                                       
                                    <td>Artikel</td>
                                    <td>Menge</td>
                                    <td>Preis</td>   
                                    <td>Bestelldatum</td>
                                </tr>   
                            </thead>
                            <tbody>       
                                {{-- Bestellung Infos --}}
                                @foreach($articles as $article)
                                    @if($article->user_id == Auth::user()->id)
                                        <tr>
                                            <td>{{$article->article}}</td>                      
                                            <td>{{$article->qty}}</td>                                     
                                            <td>{{$article->price}}</td>
                                            <td>{{$article->sale_date}}</td>
                                        </tr> 
                                    @endif
                                @endforeach
                            </tbody>
                        </table>     
                </div>
            </div> 
        </x-slot>        
</x-app-layout>
