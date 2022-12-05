<x-layout-payment> 
<x-slot name="body">

        @if (session('success'))
                <div class="pm-success">
                Zahlung erfolgreich!
                </div>
        @endif

        <div class="pm-thanks">
                <h3>Vielen Dank für deine Bestellung!</h3>
                <p>Wir senden dir deine Rechnung per Email zu.</p>

                <a href="/index-shop">
                        <button>Home</button>
                </a>
        </div>
          
</x-slot>
</x-layout-payment> 