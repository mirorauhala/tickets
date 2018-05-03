@extends('layouts.base')

@section('base.title', tra('tickets.title'))

@section('base.content')
<div class="container h-100">
    <div class="row h-25 my-3 justify-content-center align-items-center">
        <div class="col-md-12">
            <h1>{{ tra('tickets.title')}}</h1>
            <p class="lead">&nbsp;</h1>

            @include('tickets._menu')
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <qr-code text="{{ $order_item->barcode }}" :size="200" bg-color="transparent"></qr-code>
            <p class="text-muted">{{ $order_item->barcode }}</p>
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
@endsection
