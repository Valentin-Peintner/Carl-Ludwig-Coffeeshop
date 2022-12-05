@section('pageTitle', 'Shop | Kaffee')

<x-layout-shop>
    <x-slot name="body">
        <div id="article-description">

            {{-- Zurück zur Kaffee View --}}
            <div id="retour-coffee">
                <a href="/coffee">Zurück</a>
            </div>
    
                {{-- Produkt Bild --}}
                <img src="{{$product->image}} " width="auto" height="400" alt="Kaffeepackung">
    
                {{-- Informationen zum Produkt - rechts vom Bild --}}
                <section class="package-description">
                    <h2>{{$product->name}} - <br> {{$product->roast}}</h2>
                        <p class="flavor">{{$product->description}}</p>

                        @if ($product->roast === "Espresso")
                            <p class="top">Dieser Espresso eignet sich am besten für die Zubereitung im Siebträger, dem Vollautomaten <br> oder in der Herdkanne.</p>
                        @else
                            <p class="top">Dieser Filter eignet sich am besten für die Zubereitung als Poor Overs, mit einer V60 oder einer Aeropress</p>
                        @endif

                    {{-- Preis --}}
                    <div class="price-info-coffee">
                        <h3>€ {{ number_format(($product->price),2,',') }}</h3>
                        <p>inkl. Mwst. zzgl. Versandkosten</p>
                    </div>
                
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
                        <form action="{{route('coffee.addToCart',['id'=>$product->id])}}" method="post" id="options">
                            @csrf
                                {{-- Gewicht --}}
                                <label for="gewicht">Gewicht wählen:</label><br>
                                    <select id="gewicht" name="gewicht" form="options">
                                        <option value="250g">250g</option>
                                    </select>
                                <br>

                                {{-- Mahlgrad --}}
                                <label for="grind">Mahlgrad wählen:</label><br>
                                    <select id="grind" name="grind" form="options">
                                        <option value="Ganze Bohnen" selected>Ganze Bohnen</option>
                                    </select>
                                <br>

                                {{-- Stückzahl --}}
                                <select id="amount" name="amount" form="options">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                    
                                <button type="submit"> In den Warenkorb </button></a>
                        </form>

                        {{-- Erfolgs Message wenn Artikel hinzugefügt wird--}}
                        @if(session()->has('message'))
                            <div class="alert alert-success" id="success-message">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>
                </section>
        </div>
            
        {{-- Beschreibung unterhalb vom Bild - oberere Teil --}}
        <div id="wrapper">
            <div class="flex-description-bottom">
                <section class="left-description">
                    
                    {{-- Fall Abfrage --}}
                    @if ($product->name === 'Morning Blend')
                        <p class="coffee-info-top">
                            Anbauhöhe: <span>bis 1.900m</span> <br>
                            Aufbereitung: <span>Natural & Gewaschen</span> <br>
                            Varietät: <span>Catuai, Bourbon</span> <br>
                            Röstung: <span>Mittel, Dunkel</span> <br>
                            Geschmack: <span>Milchschokolade - rote Beeren</span></p>

                    @elseif ($product->name === "Afternoon Blend")
                        <p class="coffee-info-top">
                            Anbauhöhe: <span>bis 1.900m</span> <br>
                            Aufbereitung: <span>Natural</span> <br>
                            Varietät: <span>Catuai, Bourbon</span> <br>
                            Röstung: <span>Dunkel</span> <br>
                            Geschmack: <span>Nougat - exotische Früchte</span></p>

                    @else
                        <p class="coffee-info-top">
                            Anbauhöhe: <span>bis 1.400m</span> <br>
                            Aufbereitung: <span>Washed</span> <br>
                            Varietät: <span>Yiracheffe</span> <br>
                            Röstung: <span>Hell</span> <br>
                            Geschmack: <span>Orange - rote Beeren </span></p>
                    @endif

                    {{-- Fall Abfrage Beschreibung links unten --}}
                    @if ($product->name === "Morning Blend")
                        <p class="coffee-info-bottom">
                        Dieser Kaffee eignet sich am besten für die Zubereitung in dem Siebträger, dem Vollautomaten oder in der Herdkanne.<br><br>
                        Unsere Morning Blend ist einer unserer standard Espresso Röstungen. Er ist eine Mischung aus drei verschiedenen Länderkaffees: 50% Brasilien,  25% El Salvador und 25% Peru.</p>

                    @elseif ($product->name === "Afternoon Blend")
                        <p class="coffee-info-bottom">
                        Dieser Kaffee eignet sich am besten für die Zubereitung in dem Siebträger, dem Vollautomaten oder in der Herdkanne.<br><br>
                        Unsere Afternoon Blend ist einer unserer standard Espresso Röstungen. Er ist Single Origin von folgendem Länderkaffee: 100% Guatemala</p>

                    @else
                        <p class="coffee-info-bottom">
                            Dieser Filter eignet sich am besten für die Zubereitung als Poor Overs, mit einer V60 oder einer Aeropress<br><br>
                            Unsere Carl Ludwig Filter ist einer unserer standard Filter Röstungen. Er ist Single Origin von folgendem Länderkaffee: 100% Äthiopien</p>
                        @endif
                </section>

                {{-- Fall Abfrage Zubereitungsempfehlung - Teil recht unter Produkt Info--}}
                <div class="right-description">
                    <section>
                        <h4>Zubereitungsempfehlung</h4>
                        @if ($product->name === "Morning Blend" || $product->name === 'Afternoon Blend')
                            <p class="text-under-header">Bereite deinen Morning blend in einem Siebträger zu:</p> 
                                <ul>
                                    <li>Siebträger ausspannen und mit einem Tuch auswischen.</li>
                                    <li>Gebe 19g Kaffee für einen Doppelshot in den Träger       
                                    (Mahlgrad: fein).</li>
                                    <li>Verteile das Kaffeemehl gleichmäßig,
                                    anschließend mit einem Tampers und einem Druck von 15kg verdichten.</li>
                                    <li>Die Brühgruppe spülen und den Siebträger einspannen.</li>
                                    <li>Tassen unter den Auslauf stellen und den Brühvorgang starten. Dieser sollte 25-30 Sekunden lang andauern.</li>
                                </ul>

                        @else
                            <p class="text-under-header">Bereite deinen Carl Ludwif Filter mit einer V60 zu:</p> 
                                <ul>
                                    <li>Wasser auf 88°C - 96°C kochen</li>
                                    <li>Kaffee grob mahlen und Papierfilter befeuchten </li>
                                    <li>Geben Sie 18g-22g Kaffee dazu</li>
                                    <li>Verteile das Kaffeemehl gleichmäßig</li>
                                    <li>Timer auf der Waage starten und 50g Wasser auf 30 Sekunden dazugeben </li>
                                    <li>Restliche Menge Wasser langsam drübergießen. Vorgang sollte nach 2:15 Minuten beendet sein</li>
                                </ul>
                        @endif
                    </section>
                </div>
            </div>
        </div>  
    </x-slot>
</x-layout-shop>