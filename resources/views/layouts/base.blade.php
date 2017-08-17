<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">

    <!-- CSRF Token -->
    <meta id="csrfToken" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tikematic') }} - @yield('base.title', 'Untitled')</title>

    <!-- Styles -->
    <meta name="theme-color" content="#2A5CFF">
    <link rel="manifest" href="/manifest.json">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" async="true">
</head>
<body>
    @yield('base.content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async="true"></script>
</body>
</html>
