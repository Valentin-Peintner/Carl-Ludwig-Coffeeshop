<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('pageTitle')</title>

    {{-- Stylesheet & Scripts --}}
    @vite(['resources/css/app.css'])
    @vite(['resources/js/header-shop.js'])
    @vite(['resources/js/cart.js'])
  
</head>

<body class="antialiased">
    
    {{-- Header --}}
    <div>
        <x-header-payment></x-header-payment> 
    </div>

    {{-- Content --}}
    <div>
        {{ $body }}
    </div>

</body>
    {{-- Stripe JS --}}
    @yield('scripts')
</html
