{{-- Styling Email --}}
<style>
    h1{
        font-family: 'Helvetica Neue',sans-serif;
        text-transform: uppercase;
        text-align: center;
    }
    .invoice-text{
        font-family: 'Helvetica Neue',sans-serif;
        font-size: 18px;
        text-align: center;
    }
    .invoice-overview{
        display:flex;
        justify-content: center;
        align-items: center;
        font-family: 'Helvetica Neue',sans-serif;
        font-size: 18px;
        margin: 1rem 0;
    }

    /* Tabelle */
    .table-products {
        border-collapse: collapse;
        margin: 2rem auto 1rem auto;
        width: auto;
    }
    .table-products thead tr {
        font-family: 'Julius Sans One',sans-serif;
        font-size: 20px;
        background-color: #456772;
        color: #ffffff;
        text-align: left;
        border-right: 2px solid #456772;
        border-top: 2px solid #456772;
        border-left: 2px solid #456772;
    }
    .table-products th,
    .table-products td {
        padding: 12px 15px; 
    }
    .table-products tbody tr {
        border-bottom: 1px solid #dddddd;
        font-family: 'Julius Sans One',sans-serif;
        font-size: 18px;
        border-right: 2px solid #456772;
        border-left: 2px solid #456772;
    }
    .table-products tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }
    .table-products tbody tr:last-of-type {
        border-bottom: 2px solid #456772;
    }
    .table-products tbody td:nth-last-child(2){
    text-align: right;
    }
    .table-products tfoot tr:nth-last-child(2){
    }
    .table-products tfoot tr {
    font-family: 'Julius Sans One',sans-serif;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 18px;
    border-bottom: 1px solid #dddddd;
    }
</style>


{{-- Überschrift --}}
<h1>Hallo {{$name}}!</h1>
    {{-- Text unter Überschrift --}}
    <p class="invoice-text">Deine Bestellung ist bei uns eingegangen.</p>
    <p class="invoice-text">Du wirst in den nächsten Tagen von uns deine DHL Tracking Nummer erhalten, damit du deine Bestellung verfolgen kannst.</p><br>

    <p class="invoice-text">Das ist deine Bestellübersicht:</p>

{{-- Div beinhaltet Tabelle --}}
<div class="invoice-overview"> <br>
    {{-- Tabelle --}}
    <table class="table-products">
        <thead>
            <tr>
                <td>Bestellnummer</td>
                <td>Artikel</td>
                <td>Menge</td>
                <td>Preis in EUR</td>  
            </tr>
        </thead>  
        <tbody>
            {{-- Bestell Infos werden ausgelesen --}}
            @foreach ($articles as $article)
                @if($article->order_id == $lastOrder->order_id)
                    <tr>
                        <td>{{$article->order_id}}</td>
                        <td>{{$article->article}}</td>                      
                        <td>{{$article->qty}}</td>                                     
                        <td>{{$article->price * $article->qty}}</td>
                    </tr> 
                @endif
            @endforeach
        </tbody>
        <tfoot>
                {{-- Fallabfrage zwecks Versandkosten --}}
                <tr>
                    @if($totalPrice > 0 && $totalPrice < 65)
                    <td>Versandkosten € 4.9</td>
                    <td>Gesamtsumme € {{$totalPrice +4.9}}</td>
                    @elseif($totalPrice >= 65)
                    <td>GesamtsummeSumme € {{$totalPrice}}</td>
                    @endif
                </tr>
        </tfoot>
    </table>
</div>

