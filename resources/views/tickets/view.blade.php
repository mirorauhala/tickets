@extends('layouts.tickets')

@section('content')

<div class="row">
    <div class="col-md-3">
        <qr-code text="{{ $order_item->barcode }}" :size="200" bg-color="transparent"></qr-code>
        <p class="text-muted text-center">{{ $order_item->barcode }}</p>
    </div>
    <div class="col-md-8">
        <h1>{{ $order_item->title }}</h1>
        <ul class="list-unstyled">
            <li><b>Hinta</b>: {{ money($order_item->value, "EUR") }}</li>
            <li><b>Pohjautuu tilaukseen</b>: <a href="{{ route('settings.orders.show', ['order' => $order_item->order->reference]) }}">{{ $order_item->order->reference }}</a></li>
        </ul>
    </div>
</div>
@endsection
