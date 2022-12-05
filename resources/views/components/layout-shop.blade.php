<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageTitle')</title>

    {{-- Stylesheet & Scripts --}}
    @vite(['resources/css/app.css'])
    @vite(['resources/js/header-shop.js'])
    @vite(['resources/js/cart.js'])
    
</head>
    <body class="antialiased">
      {{-- Header --}}
      <div>
        <x-header-shop> </x-header-shop> 
      </div>

      {{-- Content --}}
      <div>
        {{ $body }}
      </div>

      {{-- Footer --}}
      <div>
      <x-footer-shop></x-footer-shop> 
      </div>
  </body>
</html
