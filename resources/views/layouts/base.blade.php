<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tickets') }} - @yield('base.title', 'Untitled')</title>

    <meta name="theme-color" content="#2A5CFF">
    <link rel="manifest" href="/manifest.json">
    <link href="{{ mix('css/app.css') }}" integrity="{{ Sri::hash('css/app.css') }}" crossorigin="anonymous" rel="stylesheet">

</head>
<body class="bg-light">
    <div id="app">
        @include('partials._navigation')
        <main class="py-5">
            @yield('base.content')
        </main>
    </div>
    <script src="{{ mix('js/app.js') }}" integrity="{{ Sri::hash('js/app.js') }}" crossorigin="anonymous"></script>
</body>
</html>
