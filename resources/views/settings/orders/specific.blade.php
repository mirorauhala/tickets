@extends('layouts.settings')

@section('settings.title', Helper::tra('settings.order.title') ." ".  $order->reference)

@section('content')

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <td>{{ Helper::tra('settings.orders.reference') }}</td>
                <td>{{ Helper::tra('settings.orders.value') }}</td>
                <td>{{ Helper::tra('settings.orders.status') }}</td>
                <td>{{ Helper::tra('settings.orders.date') }}</td>
                <td>{{ Helper::tra('settings.orders.action') }}</td>
            </tr>
        </thead>
        <tbody>
            <tr class="{{ ($order->status == "pending") ? "info" : "" }}">
                <td>{{ $order->reference }}</td>
                <td>{{ Helper::decimalMoneyFormatter($order->value, $order->currency) }}</td>
                <td>{{ $order->status }}</td>
                <td title="{{ $order->created_at->diffForHumans() }}">{{ $order->created_at }}</td>
                <td><a href="{{ route('settings.orders.specific', ['order' => $order->reference]) }}">View full order</a></td>
            </tr>
        </tbody>
    </table>
</div>

<h3>List of items</h3>
@if(count($order_items) > 0)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>{{ Helper::tra('settings.order.item-title') }}</td>
                    <td>{{ Helper::tra('settings.order.value') }}</td>
                </tr>
            </thead>
            <tbody>
                @foreach($order_items as $order_item)
                    <tr>
                        <td>{{ $order_item->title }}</td>
                        <td>{{ Helper::decimalMoneyFormatter($order_item->value, $order->currency) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>{{ Helper::tra('settings.orders.no-items') }}</p>
@endif
@endsection
