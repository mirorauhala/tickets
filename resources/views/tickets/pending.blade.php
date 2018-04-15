@extends('layouts.tickets')

@section('content')

<div class="row">
@if(count($order_items) > 0)
    <div class="col-md-12">
        <p class="lead">{{ tra('tickets.pending-message') }}</p>
    </div>
    @foreach($order_items as $order_item)
        <div class="col-lg-5 col-md-5 col-sm-5">
            <div class="ticket">
                <div class="ticket-heading">
                    <h1>{{ $order_item->title }}</h1>
                </div>

                <div class="ticket-meta">
                    <p>{{ $order_item->order->event->name }}</p>
                </div>

                <div class="ticket-body">
                    <div class="ticket-price">
                        <h2>{{ tra('tickets.card.price') }}</h2>
                        <p>{{ money($order_item->value, "EUR") }}</p>
                    </div>

                    <div class="ticket-seating-code">
                        @if($order_item->seat)
                            <h2>{{ tra('tickets.card.seating-code') }}</h2>
                            <p>{{ $order_item->seat->name }}</p>
                        @else
                            <h2>{{ tra('tickets.card.seating-code') }}</h2>
                            <p>-</p>
                        @endif
                    </div>
                </div>

                <div class="ticket-actions">
                    <a class="ticket-code" href="{{ route('settings.orders.show', ['order' => $order_item->order->reference ]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path fill="#333" d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z" /></svg>
                        <span>{{ tra('tickets.card.action-details') }}</span>
                    </a>
                </div>
                </a>
            </div>
        </div>
    @endforeach
@else
    <div class="col-md-12">
        <p>{{ tra('tickets.no-pending') }}</p>
    </div>
@endif
</div>
@endsection
