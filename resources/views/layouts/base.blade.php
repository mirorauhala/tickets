<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tickets') }} - @yield('base.title', 'Untitled')</title>

    <!-- Styles -->
    <meta name="theme-color" content="#2A5CFF">
    <link rel="manifest" href="/manifest.json">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,700,800,800i" rel="stylesheet">
</head>
<body>
    <div id="app" class="h-100">
        @include('partials._navigation')
        <main class="py-5 h-100">
            @yield('base.content')
        </main>
    </div>


    <footer>
        {{ current_commit() }}
    </footer>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
