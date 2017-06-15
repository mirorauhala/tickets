@extends('layouts.tickets')

@section('content')

<div class="row">
@if(count($order_items) > 0)
    <div class="col-md-12">
        <p class="lead">{{ Helper::tra('tickets.pending-message') }}</p>
    </div>
    @foreach($order_items as $order_item)
        <div class="col-lg-5 col-md-6 col-sm-6">
            <div class="ticket-card">
                <div class="ticket-details">
                    <h1>{{ $order_item->title }}</h1>
                    <p>{{ Helper::decimalMoneyFormatter($order_item->value, "EUR") }}</p>
                    @if($order_item->status == "pending")
                        <p>Pending</p>
                    @elseif($order_item->status == "paid")
                        <p>Paid</p>
                    @elseif($order_item->status == "unassigned")
                        <p>Paid but unassigned</p>
                    @endif
                </div>

                @if($order_item->status == "pending")
                    <a href="{{ route('settings.orders.specific', ['order' => $order_item->reference ]) }}" class="ticket-action">
                        <span>Finish order</span>
                    </a>
                @elseif($order_item->status == "paid")
                    <a href="{{ route('tickets.view', ['order' => $order_item->reference ]) }}" class="ticket-action">
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
        <p>{{ Helper::tra('tickets.no-pending') }}</p>
    </div>
@endif
</div>
@endsection
