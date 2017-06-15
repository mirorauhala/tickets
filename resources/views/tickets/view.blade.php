@extends('layouts.tickets')

@section('content')

<div class="row">
    <div class="col-md-3">
        <canvas id="qrcode" data-qrcode="{{ $order_item->barcode }}"></canvas>
        <p class="text-muted text-center">{{ $order_item->barcode }}</p>
    </div>
    <div class="col-md-8">
        <h1>{{ $order_item->title }}</h1>
        <ul class="list-unstyled">
            <li><b>Hinta</b>: {{ $order_item->value }}</li>
            <li><b>Pohjautuu tilaukseen</b>: <a href="{{ route('settings.orders.specific', ['order' => $order_item->order->reference]) }}">{{ $order_item->order->reference }}</li>
        </ul>
    </div>
</div>
@endsection
