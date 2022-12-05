{{-- Kontakt --}}
@section('pageTitle', 'Carl Ludwig Cafe | Kontakt')

<x-layout>
    <x-slot name="body">
        {{-- header --}}
        <div class="start-contact">
            <img class="object-fit" src="/assets/img/highlights/terasse_neu.jpeg" id="contact" alt="kaffeebohnen" width="105%" height="400">
        </div>

        {{-- div unter Header --}}
        <div class="contact">
            <section>
                <h3>Get in Touch</h3>
                <p>Bitte beachten Sie, dass wir keine Reservierungen vornehmen! <br><br><br>            
                +43 664 4972665 
                <br> 
                <a href="#">info@carlludwig.cafe</a>
                </p>
            </section>
        </div>

        {{-- Kontakt Formular --}}
        <div class="form-contact">
            <label for="form">Schreiben Sie uns eine Nachricht!</label>
                <form action="/contact" method="post" id="form">
                    @csrf

                    <input type="text" name="name" placeholder="Ihr Name" required><br>
                    <input type="numeric" name="phone" placeholder="Ihre Telefonnummer" required><br>
                    <input type="email" name="email" placeholder="Ihre Email " required><br>
                    <textarea name="message" id="message" rows="10" cols="29" rows="30" placeholder="Ihre Nachricht"  required>     
                    </textarea><br>
                    <button type="submit">Senden</button>
                </form>

            {{-- Erfolgs Nachricht --}}
            @if(session()->has('message'))
                <div class="alert alert-success" id="success-message">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
    

        {{-- Google Maps  --}}
        {{-- Wird angezeigt nachdem der Button geklickt und bestätigt wurde --}}
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe style="display: none" width="100%" height="300" id="gmap_canvas" data-src="https://maps.google.com/maps?q=carl%20ludwg%20cafe,%20wien&t=&z=15&ie=UTF8&iwloc=&output=embed" data-2click-type="map"   
                frameborder="0" scrolling="no"></iframe>
            </div>
        </div>

        {{-- DOM Manipulation --}}
        <a id="loadgooglemaps">
            <span class="button">Karte laden</span>
            {{-- Standbild wird angezeigt --}}
            <img src="/assets/img/screenshot_map.png" class="object-fit" width="100%" height="300">
        </a>

    </x-slot>
</x-layout>