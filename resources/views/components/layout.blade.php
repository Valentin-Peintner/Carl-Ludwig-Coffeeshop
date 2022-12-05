<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageTitle')</title>

    {{-- Stylesheet & Scripts --}}
    @vite(['resources/css/app.css'])
    @vite('resources/js/header.js')
    @vite('resources/js/contact.js')
       
</head>

    <body class="antialiased">

      {{-- Header --}}
      <div>
        @if(isset($header)) <!-- bei Datenschutz und Impressum wird Navbar nicht angezeigt-->
          {{ $header }}

        @else
        <x-header></x-header>
        @endif
      </div>
      
      {{-- Content --}}
      <div>
        {{ $body }}
      </div>
      
      {{-- Footer --}}
      <div>
      <x-footer></x-footer> 
      </div>
    </body>
</html
