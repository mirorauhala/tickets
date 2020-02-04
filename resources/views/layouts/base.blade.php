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

    @if(app()->environment('production'))
    {{-- Bug in laravel-sri --}}
    {{-- integrity="{{ Sri::hash('css/app.css') }}" crossorigin="anonymous"  --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @else
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @endif
</head>
<body class="bg-gray-100">
    <div id="app">
        @include('partials._navigation')
        <main class="py-5">
            @yield('base.content')
        </main>
    </div>

    @if(app()->environment('production'))
    {{-- Bug in laravel-sri --}}
    {{-- integrity="{{ Sri::hash('css/app.css') }}" crossorigin="anonymous"  --}}
    <script src="{{ mix('js/app.js') }}"></script>
    @else
    <script src="{{ mix('js/app.js') }}"></script>
    @endif

</body>
</html>
