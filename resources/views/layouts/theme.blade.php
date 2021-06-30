<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <template>
            <v-app id="app">
                <header-app @toggle-drawer="$refs.navbar.drawer = !$refs.navbar.drawer"></header-app>
                <navdrawer-app ref="navbar"></navdrawer-app>

                <!--<main class="py-4">-->
                <v-main>
                    <v-container>
                        @yield('content')
                    </v-container>
                </v-main>
                <!--</main>-->

                <footer-app></footer-app>
            </v-app>
        </template>
    </div>
</body>
</html>
