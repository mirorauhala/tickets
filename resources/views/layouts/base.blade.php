<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tikematic') }} - @yield('base.title', 'Untitled')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" async="true">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,600,900,900i" rel="stylesheet" async="true">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    @yield('base.content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async="true"></script>
</body>
</html>
