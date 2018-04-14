<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">

    <!-- CSRF Token -->
    <meta id="csrfToken" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tickets') }} - Ticket Scanner</title>

    <!-- Styles -->
    <meta name="theme-color" content="#2A5CFF">
    <link rel="manifest" href="/manifest.json">
    <link href="{{ mix('css/new.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link href="{{ mix('css/scanner.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/instascan.min.js') }}"></script>
</head>
<body>
    <div class="camera">
        <div class="camera-permissions">
            <p>Allow access to camera</p>
        </div>

        <video id="qr-feed"></video>

        <div class="manual-barcode">
            <a href="#" class="button button-block">Enter manually</a>
        </div>
    </div>

    <div class="manual-entry">

        <h1>Enter barcode manually</h1>
        <div class="">

        </div>

    </div>

    <div class="data-body">

        <div class="data-close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M19 6.4L17.6 5 12 10.6 6.4 5 5 6.4l5.6 5.6L5 17.6 6.4 19l5.6-5.6 5.6 5.6 1.4-1.4-5.6-5.6L19 6.4z"/></svg>
        </div>

        <h1>Ticket information</h1>
        <p class="barcode" id="scanner-ticket-barcode"></p>
        <div class="box-details">
            <div class="ticket-type">
                <h2 class="box-title">Type</h2>
                <p class="box-data" id="scanner-ticket-type"></p>
            </div>

            <div class="ticket-scan-status">
                <h2 class="box-title">Scanned</h2>
                <p class="box-data" id="scanner-ticket-scan"></p>
            </div>

            <div class="ticket-seatingcode">
                <h2 class="box-title">Seating code</h2>
                <p class="box-data" id="scanner-ticket-seating-code"></p>
            </div>

            <div class="ticket-value">
                <h2 class="box-title">Ticket value</h2>
                <p class="box-data" id="scanner-ticket-value"></p>
            </div>

        </div>

        <h1>Order information</h1>
        <div class="order-details">
            <div class="ticket-type">
                <h2 class="box-title">Type</h2>
                <p class="box-data" id="scanner-ticket-type"></p>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/scanner.js') }}"></script>
</body>
</html>
