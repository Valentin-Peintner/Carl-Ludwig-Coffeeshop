@section('pageTitle', 'Shop | Zubehör')

<x-layout-shop>
    <x-slot name="body">
       <div id="equipment">

            {{-- Zurück zur Equipment View --}}
            <div id="retour">
                <a href="/equipment">Zurück</a>
            </div>

                {{-- Produktbild --}}
                <img src="{{$product->image}}" width="auto" height="400" alt="">
    
                {{-- Informationen zum Produkt - recht vom Bild--}}
                <div class="equipment-description">
                    <h2>{{$product->name}}</h2>
                    <p class="hario">{{$product->description}}</p>

                    {{-- Preis --}}
                    <section class="price-info-equipment">
                        <h3>€ {{ number_format(($product->price),2,',') }}</h3>
                        <p>inkl. Mwst. zzgl. Versandkosten</p>
                    </section>
                
                    {{-- Verfügbar Status --}}
                    <div id="status">
                        @if ($product->piece_available !== 0)
                        <p>Verfügbar</p>
                        @else
                        <p style="color:red">Nicht Verfügbar</p>  
                        @endif
                    </div>

                    {{-- Form zum auswählen der Menge --}}
                    <div class="form-group">  
                        {{-- Produkt dem WarenKorb hinzufügen --}}  
                        <form action="{{route('equipment.addToCart',['id'=>$product->id])}}" method="post" id="options">
                            @csrf

                            {{-- Menge --}}
                            <label for="amount">Menge:</label><br>
                            <select id="amount" name="amount" form="options">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>

                            <button value="submit"> In den Warenkorb </button>
                        </form>

                        {{-- Erfolgs Message wenn Artikel hinzugefügt wird--}}       
                        @if(session()->has('message'))
                            <div class="alert alert-success" id="success-message">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        {{-- Produkt Zusatz Beschreibung --}}
        <div class="equipment-info">
            <section>
                <h3>Beschreibung</h3>
                <p>Bei den V60 Drippern von Hario handelt es sich um eine Weiterentwicklung des klassischen, handelsüblichen Handfilters aus Porzellan. Dank der größeren und einzigen Öffnung am Boden des Filters, kann die Brühzeit mit Hilfe des Mahlgrades und der Aufgusstechnik gesteuert werden.<br><br> Die Kegelform des Filters ermöglicht einen gleichmäßigen Brühprozess , wodurch der Geschmack des Brühergebnisses gezielt beeinflusst werden kann. <br>Durch die ausgeprägten, geschwungenen Rippen auf der Innenseite des Handfilters wird das Filterpapier effizient von der Filterhalterwand ferngehalten.
                <br><br>
                Die V60 Dripper von Hario eignen sich für jeden, der ein klares Aromaprofil mit leichtem Körper ohne Kaffeesatzreste im Brühergebnis bevorzugt.<br>
                Die Größe 02 aus Keramik eignet sich für die Zubereitung von bis zu 600ml Kaffee.             
            </section>

        </div>        
    </x-slot>
</x-layout-shop>