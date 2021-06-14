!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link rel='stylesheet' href="{{ asset('css/app.css') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @stack('styles')
</head>
<body>
<div id='app'>
    <v-app>
        <div id='content'>
            @yield('content')
        </div>
    </v-app>
</div>

@include('footer')

<script src="{{ asset('js/app.js') }}" defer></script>

@stack('scripts')

</body>
</html>
