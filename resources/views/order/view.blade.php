@extends('layouts.order')
@section('content')


<h1>Order {{ $order->reference }}</h1>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <td>{{ Helper::tra('settings.orders.reference') }}</td>
                <td>{{ Helper::tra('settings.orders.value') }}</td>
                <td>{{ Helper::tra('settings.orders.status') }}</td>
            </tr>
        </thead>
        <tbody>
            <tr class="{{ ($order->status == "pending") ? "info" : "" }}">
                <td>{{ $order->reference }}</td>
                <td>{{ Helper::decimalMoneyFormatter($order->value, $order->currency) }}</td>
                <td>{{ $order->status }}</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>List of items</h1>
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

@if($count_seats > 0)
    <h1>Seats {{ $count_seats }}</h1>

    @foreach($maps as $map)

        <h2>{{ $map->name }}</h2>
        <p>{{ $map->description }}</p>

        <div class="map" style="height: 500px" data-toggle="buttons">
            @foreach($map->seats as $seat)
                <label class="btn seat seat-{{ $seat->status }} " style="height: 20px; width: 20px; top: {{ $seat->top }}px; left: {{ $seat->left }}px;">
                    <input type="checkbox" name="seats[][{{ $map->id }}]" autocomplete="off" >
                </label>
            @endforeach
        </div>
    @endforeach
@endif
<h1>Total</h1>


@endsection
