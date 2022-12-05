@section('pageTitle', 'Shop | Warenkorb')

<x-layout-shop>
    <x-slot name="body">
        {{-- Zur Kassa Button --}}
        <div id="btn-primary">
            {{-- Nur möglich wenn Produkte im Warenkorb vorhanden sind --}}
            @if(!isset($cart->items))
            <button>Zur Kassa</button>
            @else
            <a href="{{route ('stripe.adress')}}">
                <button type="submit">Zur Kassa</button>
            </a>
            @endif
        </div>

        {{-- Tabelle für Produkte --}}
        <div id="table-container">
            <table>
                {{-- Table Head --}}
                <thead class="table-head">
                <tr>
                    <th>Artikel</th>
                    <th>Anzahl</th>
                    <th>Stückpreis</th>
                    <th>Summe</th>
                </tr>
            </thead>
            {{-- Table Body --}}
            <tbody class="table-row">
                {{-- Warenkorb Inhalt anzeigen --}}
                @if (isset($cart->items)) 
                    {{-- Verschachtelte Foreach-Schleife um Produkte auszulesen --}}
                    @foreach ($cart->items as $type_key => $type )
                        @foreach ($type as $key => $item)
                            <tr>
                                <td>{{ $item['item']['name']}}</td>
                                <td>{{ $item['qty']}}</td>
                                <td>€ {{ number_format(($item['item_price']),2,',') }}</td>    
                                <td>€ {{ number_format(($item['item_price']*$item['qty']),2,',') }}</td>
                                
                            {{-- Spalte zum Artikel löschen --}}
                            <td> 
                                {{-- Über Formular Artikel löschen --}}
                                <form action="{{route('cart.destroy',$key)}}" method="post" data-title="{{$item['item']}}" class="delete" data-body="Soll der Artikel <strong>{{$item['item']['name']}}</strong> gelöscht werden?" data-error="Artikel nicht gefunden">
                                    <div class="modal-body">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" name="type" value="{{$type_key}}">
                                        <button type="submit" class="btn btn-outline-danger fa fa-trash" id="btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal">X</button>
                                    </div>  
                                </form>
                            </td>
                        </tr>   
                    @endforeach
                @endforeach
            @endif
        </tbody>
    </table>
</div>        

        {{-- Preisauflistung unterhalb vom Warenkorb --}} 
        <div id="price-info-container">
            {{-- Tabelle zum Anzeigen der Preis Info --}}
            <table class="price-summary">  

                @if(($cart != null && $cart->calcTotalPrice()))
                    <tr>
                        <td>Summe</td>
                        <td>€ {{ number_format(($cart->calcTotalPrice()),2,',') }}</td>
                    </tr>

                    {{-- es muss ermittelt werden ob Versandkosten dazu kommen oder nicht --}}
                    @if ($cart->calcTotalPrice() == 0 || $cart->calcTotalPrice() >= 65)
                    <tr>
                        <td>Versandkosten</td>
                        <td>€ 0,00</td>
                    </tr>
                    @else
                    <tr>
                        <td>Versandkosten</td>
                        <td>€ 4,90</td>
                    </tr>
                    @endif

                    {{-- Gesamtsumme mit oder ohne Versandkosten --}}
                    @if ($cart->calcTotalPrice() >= 65 || $cart->calcTotalPrice() == 0)
                    <tr>
                        <td>Gesamtsumme</td>
                        <td>€ {{ number_format(($cart->calcTotalPrice() + 0),2,',')}}</td>
                    </tr>
                    @elseif ($cart->calcTotalPrice() > 0 && $cart->calcTotalPrice() < 65)
                    <tr>
                        <td>Gesamtsumme</td>
                        <td>€ {{ number_format(($cart->calcTotalPrice() + 4.90),2,',')}}</td>
                    </tr>
                    @endif

                    {{-- Betrag Ohne MWST --}}
                    <tr>
                        <td>Gesamtsumme ohne Mwst.</td>
                        <td>€ {{ number_format(($cart->calcTotalPrice() / 1.07),2,',')}}</td>
                    </tr>

                    {{-- Mwst mit oder ohne Versandkosten --}}
                    <tr>
                        @if ($cart->calcTotalPrice() > 0 && $cart->calcTotalPrice() < 65)    

                        <td>zzgl. 7% Mwst.</td>
                        <td>€ {{ number_format(($cart->calcTotalPrice() / 1.07 * 0.07 + 4.9 ),2,',')}}</td>
                    </tr> 

                    @elseif ($cart->calcTotalPrice() >= 65 || $cart->calcTotalPrice() == 0)
                    <tr>     
                        <td>zzgl. 7% Mwst.</td>
                        <td>€ {{ number_format(($cart->calcTotalPrice() / 1.07 * 0.07 ),2,',')}}</td>
                    </tr> 
                    @endif
                    
                @endif     
            </table>
        </div>
    </x-slot>
</x-layout-shop> 