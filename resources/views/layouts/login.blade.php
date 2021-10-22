<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vuetify</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts 
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    -->

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}"></script>
    -->

    @yield('styles')

</head>

<body>


    <div id="app">
        <v-app>
          <v-main>
            <v-container>Hello world</v-container>
          </v-main>
        </v-app>
      </div>

    <script src="{{asset('js/vue.js')}}"></script>

    @yield('scripts')


</body>

</html>
