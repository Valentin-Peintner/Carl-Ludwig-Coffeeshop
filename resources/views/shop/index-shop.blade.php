
@section('pageTitle', 'Shop | Home')

<x-layout-shop>
    <x-slot name="body">
        {{-- Logo --}}
        <div class="start-s">
            <img class="object-fit" src="/assets/img/highlights/kaffee2.jpg" width="100%" height="500" alt="firmenlogo">
        </div>

            {{-- Anzeige Kaffee auf Startseite Shop --}}
            <div id="offer">
                @foreach ($products as $product)
                <section class="package">
                    <a href="/coffee-single-m/{{$product->id}}">
                        <img src={{$product->image}} width="auto" height="300" alt="Kaffeepackung"></a>
                    {{-- Produkt Beschreibung --}}
                    <h2>{{$product->name}}</h2>
                    <h4>{{$product->roast}}</h4>
                    <p class="description">{{$product->description}}</p>
                    <p class="amount">{{$product->amount}}</p>
                    <p class="price">€ {{ number_format(($product->price),2,',') }}</p>
                </section>
                @endforeach
            </div>


            {{-- Div unter dem Kaffee mit Details zu Lieferung und Kaffee  --}}
            <div id="extraInfo">
                {{-- Links --}}
                <section class="details-left">
                    <img id="img-1" src="/assets/img/icons/lieferung.png" width="auto" height="100" alt="lieferwagen">
                    <h3>Versandkostenfrei bestellen</h3>
                    <p>Wir liefern Ihnen Ihren Kaffee versandkostenfrei innerhalb der EU ab einem Bestellwert von 65,00 €. Sicher und bequem per DHL.
                    </p>
                </section>

                {{-- Rechts --}}
                <section class="details-right">
                    <img id="img-2" src="/assets/img/icons/fairtrade.png" width="auto" height="100" alt="handshake">
                    <h3>Fair und direkt gehandelter Kaffee</h3>
                    <p>Die Rohkaffees für unsere Kaffees werden sorgfältig ausgewählt und direkt bei den Farmern in den Ursprungsländern eingekauft. Dadurch kann ein fairer Handel und beste Qualität garantiert werden.
                    </p>
                </section>
            </div>
    </x-slot>
</x-layout-shop>