@extends('layouts.tickets')

@section('content')

<div class="row">
@if(count($order_items) > 0)
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
                        <h2>{{ Helper::tra('tickets.card.price') }}</h2>
                        <p>{{ Helper::decimalMoneyFormatter($order_item->value, "EUR") }}</p>
                    </div>

                    <div class="ticket-seating-code">
                        @if($order_item->seat)
                            <h2>{{ Helper::tra('tickets.card.seating-code') }}</h2>
                            <p>{{ $order_item->seat->name }}</p>
                        @else
                            <h2>{{ Helper::tra('tickets.card.seating-code') }}</h2>
                            <p>-</p>
                        @endif
                    </div>
                </div>

                <div class="ticket-actions">
                    <a class="ticket-details" href="{{ route('settings.orders.specific', ['order' => $order_item->order->reference ]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path fill="#333" d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z" /></svg><span>{{ Helper::tra('tickets.card.action-details') }}</span>
                    </a>

                    <a class="ticket-code" href="{{ route('tickets.view', ['order' => $order_item->barcode ]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path fill="#333" d="M3,11H5V13H3V11M11,5H13V9H11V5M9,11H13V15H11V13H9V11M15,11H17V13H19V11H21V13H19V15H21V19H19V21H17V19H13V21H11V17H15V15H17V13H15V11M19,19V15H17V19H19M15,3H21V9H15V3M17,5V7H19V5H17M3,3H9V9H3V3M5,5V7H7V5H5M3,15H9V21H3V15M5,17V19H7V17H5Z" /></svg>
                        <span>{{ Helper::tra('tickets.card.action-code') }}</span>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="col-md-12">
        <p>{{ Helper::tra('tickets.no-paid') }}</p>
    </div>
@endif
</div>
@endsection
