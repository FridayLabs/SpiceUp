<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SpiceUp') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/screen.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @yield('headJS')
    @yield('headCSS')
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    @yield('footerJS')
    <script src="{{ asset('js/screen.js') }}"></script>
</body>
</html>
