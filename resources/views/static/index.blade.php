@section('pageTitle', 'Carl Ludwig Cafe | Home')

<x-layout>
    <x-slot name="body">
        {{-- Video nach Navbar --}}
        <div class="video object-fit">
            <video poster="" loop="true" muted="" preload="auto" playsinline autoplay >
                <source src="/assets/img/media/video_ludwig.mp4" type="video/mp4">
            </video>
        </div>

        {{-- Text oben nach Video --}}
        <div class="top-text">
            <p>Coffee is something we specialise and take very seriously. <br>
            We use fantastic beans, freshly roasted by top Austria's artisan craft-roaster, Charles Fürht, which are ethically traded, and fully traceable to the individual farms and cooperatives that grow them.<p>
        </div>

        {{-- Angebot Speißen --}}
        <div class="section-food">
            <section>
                <img class="img-food object-fit" src="/assets/img/highlights/Speisen.jpg" alt="Kaffee und Kuchen" height="370" width="350">
                <h4>Kleine Speisen</h4>
                <p>Our food comes exclusively from suppliers that share the same passion and philosophy as us. Our products cakes and pastry’s come from local producers. Our food comes exclusively from suppliers that share the same passion and philosophy as us. Our products cakes and pastry’s come from local producers. Our products cakes and pastry’s come from local producers. </p>
            </section>
        </div>

        {{-- Angebot Drinks --}}
        <div class="section-drinks">
            <section>
                <img class="img-drink object-fit" src="/assets/img/highlights/coldbrew.jpg" alt="Coldbrew" height="254" width="auto">
                <img class="img-maschine object-fit" src="/assets/img/highlights/kaffee.jpg" alt="Kaffeemaschine" height="255" width="200">
                <h4>Kaffee</h4>
                <p>Our range of coffee ranges from espresso and various filter methods to cold brews and iced coffee varieties. Teas, organic lemonades and selected wines can also be found in our offer.</p>
                <p>
                Our friendly team of skilled Baristas work with careful techniques to make the very best coffee they can for you, every time. 
                </p>
                <p>
                All our Baristas are extensively trained personally, before they start serving our coffee.
                All our Baristas are extensively trained personally, before they start serving our coffee.</p>
            </section>
        </div>

        {{-- Bewertungen  --}}
        <div class="review">
            {{-- links --}}
            <section  class="left">  
                <h4>Find us in: </h4><br>
                <a href="https://www.1000things.at/info/carl-ludwig-cafe/" target="_blank">
                <p>1000 things to do in Vienna</a></p>    
            </section>
            {{-- links mitte --}}
            <section  class="left-m">               
                <h4>Also visited by:</h4><br>
                <a href="http://www.https://goodnight.at/locations/940-carl-ludwig" target="_blank"><p> Goodnight.at</a></p>
            </section>
            {{-- recht mitte --}}
            <section  class="right-m">            
                <h4> Discovered by:</h4><br>
                <a href="https://europeancoffeetrip.com/vienna-coffee-guide-top-8-viennese-cafes-you-must-visit/" target="_blank"><p>European coffee trip</a></p>
            </section>
            {{-- rechts --}}
            <section class="right">            
                <h4> Further reviews:</h4> <br>
                <a href="https://www.theviennareview.at/food-drink/10298/carl-ludwig-cafe" target="_blank"><p>The Vienna Review</a></p>
            </section>
        </div>

        {{-- Bild nach Bewertungen--}}
        <div class="picture">     
            <img class="object-fit" src="/assets/img/highlights/innen_neu.jpg" width="100%" height="750" alt="Cafe von innen">
        </div>

        {{-- Öffungszeiten --}}
        <div class="opening-info">
            <div class="info">
                <section>
                    <h2>Find us</h2><br>
                    <p>Favoritenstraße 7<br>
                    1040 Vienna, Austria</p>
                </section>
                <section>
                    <h2>Open</h2> <br>
                    <p>Mo-Fr 7.30 AM - 7.00 PM <br>
                    Sa 10.00 AM - 5.00 PM</p>
                </section>
                <section>
                    <h2>Closed</h2><br>
                    <p>sunday and public holidays</p>
                </section>
                <section>
                    <h2>Contact</h2><br>
                    <p>+43 664 4972665<br>
                    <a href="info@carlludwig.cafe">info@carlludwig.cafe</a></p>
                </section>
            </div>
        </div>      
    </x-slot>
</x-layout>