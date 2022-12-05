@section('pageTitle', 'Shop | Zubehör')

<x-layout-shop>
    <x-slot name="body">
        {{-- Eqipment Content --}}
       <div class="container-eq">

           {{-- per foreach über alle Equipment Produkte interieren--}}
           @foreach ($products as $product)
                <section class="item">

                    {{-- beim klicken wird einzelnes Produkt aufgerufen --}}
                    <a href="/equipment-single/{{$product->id}}">

                        {{-- Produkt Beschreibung --}}
                        <img src="{{$product->image}}" height="300" width="auto" alt="dripper"></a>
                        <h3>{{$product->name}}</h3>
                        <p>€ {{ number_format(($product->price),2,',') }}</p>
                </section>
            @endforeach
       </div>
    </x-slot>
</x-layout-shop>