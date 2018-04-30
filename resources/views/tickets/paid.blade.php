@extends('layouts.base')

@section('base.title', tra('tickets.title'))

@section('base.content')
<div class="container h-100">
    <div class="row h-25 my-3 justify-content-center align-items-center">
        <div class="col-md-12">
            <h1>{{ tra('tickets.title') }}</h1>
            <p class="lead">{{ tra('tickets.lead-paid') }}</h1>

            @include('tickets._menu')
        </div>
    </div>
    <div class="row">
        @if(count($order_items) > 0)
            @foreach($order_items as $order_item)
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $order_item->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $order_item->order->event->name }}</h6>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ tra('tickets.card.price') }}: {{ money($order_item->value, "EUR") }}</li>
                            @if($order_item->seat)
                                <li class="list-group-item">{{ tra('tickets.card.seating-code') }}: {{ $order_item->seat->name }}</li>
                            @endif
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('tickets.view', ['order' => $order_item->barcode ]) }}" class="card-link">{{ tra('tickets.card.show-ticket') }}</a>
                            <a href="{{ route('orders.show', ['order' => $order_item->order->reference ]) }}" class="card-link">{{ tra('tickets.card.show-order') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="lead text-muted text-center">{{ tra('tickets.no-paid') }}</p>
        @endif
    </div>
</div>
@endsection
