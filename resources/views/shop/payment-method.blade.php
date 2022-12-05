@section('pageTitle', 'Shop | Übersicht')

<x-layout-payment>
    <x-slot name="body">    
   
            {{-- Tabelle --}}
            <table class="table-products">  
                <thead>  
                    <tr>
                        <th>Artikel</th>
                        <th>Menge</th>
                        <th>Preis</th>
                    </tr>
                </thead>    
                <tbody>
                    {{-- Session $cart werden Produtke ausgelesen --}}
                        @foreach ($cart->items as $type_key => $type )
                            @foreach ($type as $key => $item)
                                <tr>
                                    <td>{{$item['item']['name']}}</td>
                                    <td>{{$item['qty']}}</td>
                                    <td>€ {{number_format(($item['item_price']*$item['qty']),2,',') }}</td>
                                </tr>
                            @endforeach
                        @endforeach           
                </tbody>
                <tfoot>
                {{-- Fallabfrage zwecks Versandkosten  --}}
                @if ($cart->calcTotalPrice() >= 65)
                <tr>
                    <td>Versandkosten</td>
                    <td></td>
                    <td>€ 0,00</td>
                </tr>

                @else
                <tr>
                    <td>Versandkosten</td>
                    <td></td>
                    <td>€ 4,90</td>
                </tr>
                @endif
                @if ($cart->calcTotalPrice() >= 65)
                    <tr class="bold">
                        <td>Gesamtsumme</td>
                        <td></td>
                        <td>€ {{ number_format(($cart->calcTotalPrice() + 0),2,',')}}</td>
                    </tr>

                    @elseif ($cart->calcTotalPrice() > 0 && $cart->calcTotalPrice() < 65)
                    <tr class="bold">
                        <td>Gesamtsumme</td>
                        <td></td>
                        <td>€ {{ number_format(($cart->calcTotalPrice() + 4.90),2,',')}}</td>
                    </tr>
                    @endif
                </tfoot>
            </table> 

            {{-- Kredit Karte --}}
            <div id="cc-form">
                <form id='checkout-form' method='POST' action="{{route('stripe.create-charge')}}">   
                    @csrf      
                        <label for="name">Name des Karteninhabers</label> <br>
                        <input type="text" name="name" id="name" required> <br >      
                        <input type='hidden' name='stripeToken' id='stripe-token-id'>      
                        <label for="card-element" class=""></label><br>
                        <div id="card-element" class="cc-card"></div>

                    <button 
                        id='pay-btn' data-secret="{{ $intent->client_secret }}"
                        class="btn btn-success mt-3"
                        type="button"
                        onclick="createToken()">Bezahlen  
                    </button>
                <form>
            </div>
       
        {{-- Stripe JS --}}
        @section('scripts')
            <script src="https://js.stripe.com/v3/"></script>
            <script>

                var stripe = Stripe('{{ env('STRIPE_KEY') }}');
                var elements = stripe.elements();
                var cardElement = elements.create('card');
                cardElement.mount('#card-element');
        
                function createToken() {
                    document.getElementById("pay-btn").disabled = true;
                    stripe.createToken(cardElement).then(function(result) {
                
                        if(typeof result.error != 'undefined') {
                            document.getElementById("pay-btn").disabled = false;
                            alert(result.error.message);
                        }
        
                        // creating token success
                        if(typeof result.token != 'undefined') {
                            document.getElementById("stripe-token-id").value = result.token.id;
                            document.getElementById('checkout-form').submit();     
                        }   
                    });
                }
            </script>
        @endsection         
    </x-slot>
</x-layout-payment> 