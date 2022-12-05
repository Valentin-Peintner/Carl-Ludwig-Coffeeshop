@section('pageTitle', 'Shop | Impressum')

<x-layout>
    {{-- Logo --}}
    <x-slot name="header">
        <x-logo />
    </x-slot>

    <x-slot name="body">
        <div class="head-i">
            <h1>Impressum</h1>
        </div>

        {{-- Content Impressum --}}
        <div class="container"> 
            <section class="content">
                <h3>Verantwortlich:</h3><br>
                    <p>Juan Rosenzweig</p>
                <br>

                <h3>Kontakt:</h3> <br>
                    <p>Telefonnummer: +43 664 4972665<br>
                        E-Mail: info@carlludwig.cafe</p>
                <br>

                <h3>Adresse:</h3> <br>
                    <p>Favoritenstrasse 7 Vienna, 1040Austria</p>
                <br>

                <h3>Umsatzsteuer-ID:</h3><br>
                <p>JXJ Specialty Coffee OG <br>
                Umsatzsteueridentifikationsnummer: <br>
                ATU74674738</p>
                <br>

                <h3>Aufsichtsbehörde:</h3><br>
                <p>Mitglied der WKÖ, Gewerbeordnung siehe 
                    <a href="http://www.ris.bka.gv.at" target="_blank">ris.bka.gv.at</p>
            </section>
        </div>

        <div>
            <button class="btn-impressum">
                <a href="/index-shop">Shop</a>
            </button>
        </div>
    </x-slot>
</x-layout>