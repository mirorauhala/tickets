@extends('layouts.tickets')

@section('content')

<div class="row">
@if(count($order_items) > 0)
    @foreach($order_items as $order_item)
        <div class="col-lg-5 col-md-6 col-sm-6">
            <div class="ticket-card">
                <div class="ticket-details">
                    <h1>{{ $order_item->title }}</h1>
                    <p>{{ Helper::decimalMoneyFormatter($order_item->value, "EUR") }}</p>
                    <p>{{ $order_item->order->reference }}</p>
                </div>

                @if($order_item->status == "pending")
                    <a href="{{ route('settings.orders.specific', ['order' => $order_item->order->reference ]) }}" class="ticket-action">
                        <span>Finish order</span>
                    </a>
                @elseif($order_item->status == "paid")
                    <a href="{{ route('tickets.view', ['order' => $order_item->barcode ]) }}" class="ticket-action">
                        <span>View ticket</span>
                    </a>
                @elseif($order_item->status == "unassigned")
                    <a href="#" class="ticket-action">
                        <span>Assign</span>
                    </a>
                @endif
                </a>
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
