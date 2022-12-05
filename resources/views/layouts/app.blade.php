<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('pageTitle')</title>

        <!-- Scripts & Stylesheets -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <body>

        <div class="body-container">
            <!-- Page Heading -->
            <header class="">  
                    {{ $header }}
            </header>
        </div>

        <!-- Page Content -->
        <main class="content-container">
            <div>{{ $nav }}</div>

            <div id="body">{{ $body }}</div>
        </main>      
    </body>

    {{-- Stripe JS --}}
    @yield('scripts')

</html>
