<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="keywords" content="jazz, Sverige, jazzkonserter, konserter, spelningar, jazzgig">

        <title>{{ config('app.name', 'Jazztider') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Gloria+Hallelujah&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles


        <!-- Scripts -->
        <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
    </head>
    <body class="md:bg-gray-50">
        <x-header />
        <div class="font-sans text-gray-900 antialiased m-2 md:m-4">
            {{ $slot }}
        </div>
        <footer class="text-center text-sm bg-gray-300 h-20 pt-2">
            Anders Fredriksson<br>
            © 2024
        </footer>
        @livewireScripts
    </body>
</html>
