{{-- Über uns --}}
@section('pageTitle', 'Carl Ludwig Cafe | Über Uns')

<x-layout>
    <x-slot name="body">
        {{-- Header --}}
        <div class="start">
            <img class="object-fit" src="/assets/img/highlights/kaffeebohnen.jpg" alt="terasse" width="105%" height="300">
        </div>

        {{-- Text --}}
        <div class="top-text-about">  
            <p>Coffee is something we specialise and take very seriously <br>
                We use fantastic beans, freshly roasted by top Austria's artisan craft-roaster, Charles Fürht, which are ethically traded, and fully traceable to the individual farms and cooperatives that grow them.<p>
        </div>

        {{-- Bildergalerie --}}
        <div class="bilder-galerie">    
            <img src="assets/img/highlights/blackwhite.jpg" alt="blackwhite" width="60%" height="auto">
            <img src="assets/img/highlights/atwork.jpg" alt="" width="60%" height="auto">
            <img src="assets/img/highlights/latteart.jpg" alt="" width="60%" height="auto">
            <img src="assets/img/highlights/iced.jpg" alt="" width="60%" height="auto">
            <img src="assets/img/highlights/regal.jpg" alt="" width="60%" height="auto">
            <img src="assets/img/highlights/atwork2.jpg" alt="" width="60%" height="auto">
            <img src="assets/img/highlights/cups.jpg" alt="" width="60%" height="auto">
            <img src="assets/img/highlights/grinder.jpg" alt="" width="60%" height="auto">
            <img src="assets/img/highlights/tonic.jpg" alt="" width="60%" height="auto">
        </div>
    </x-slot>
</x-layout>