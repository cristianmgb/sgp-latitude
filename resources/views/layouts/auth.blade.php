<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @include('partials.meta')
        <!--  App CSS (Do not remove) -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="c-app flex-row align-items-center">
        <main class="container">
            @yield('content')
        </main>
        <!-- App JS (Do not remove) -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>