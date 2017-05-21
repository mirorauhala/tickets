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
    <meta name="theme-color" content="#FF3D78">
    <link rel="manifest" href="/manifest.json">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" async="true">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet" async="true">

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
