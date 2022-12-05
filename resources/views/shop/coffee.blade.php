@section('pageTitle', 'Shop | Kaffee')

<x-layout-shop>
    <x-slot name="body">
        {{-- Kaffee Content --}}
       <div id="coffee">
           {{-- per foreach über alle Kaffee Produkte interieren--}}
           @foreach ($products as $product)
                <section class="package-single">

                    {{-- beim klicken wird einzelnes Produkt aufgerufen --}}
                    <a href="/coffee-single-m/{{$product->id}}">
                        
                    {{-- Produkt Beschreibung --}}
                    <img src="{{$product->image}}" width="auto" height="300" alt="Kaffeepackung"></a>
                    <h2>{{$product->name}}</h2>
                    <h4>{{$product->roast}}</h4>
                    <p class="description-coffee">{{$product->description}}</p>
                    <p class="amount">{{$product->amount}}</p>
                    <p class="price">€ {{ number_format(($product->price),2,',') }}</p>
                </section>
            @endforeach
       </div>
    </x-slot>
</x-layout-shop>