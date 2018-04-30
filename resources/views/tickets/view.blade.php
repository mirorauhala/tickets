@extends('layouts.base')

@section('base.title', tra('tickets.title'))

@section('base.content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row justify-content-center align-items-center h-25">
            <div class="col-md-10">
                <h1>My Tickets</h1>
                <p class="lead">Viewing ticket</h1>
            </div>
            <div class="col-md-10">
                @include('tickets._menu')
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <qr-code text="{{ $order_item->barcode }}" :size="200" bg-color="transparent"></qr-code>
                <p class="text-muted text-center">{{ $order_item->barcode }}</p>
            </div>
            <div class="col-md-8">
                <h1>{{ $order_item->title }}</h1>
                <ul class="list-unstyled">
                    <li><b>Hinta</b>: {{ money($order_item->value, "EUR") }}</li>
                    <li><b>Pohjautuu tilaukseen</b>: <a href="{{ route('orders.show', ['order' => $order_item->order->reference]) }}">{{ $order_item->order->reference }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
