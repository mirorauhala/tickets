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
                @if($order->status == "pending")
                    <td>{{ Helper::tra('settings.orders.action') }}</td>
                @endif
            </tr>
        </thead>
        <tbody>
            <tr class="{{ ($order->status == "pending") ? "info" : "" }}">
                <td>{{ $order->reference }}</td>
                <td>{{ Helper::decimalMoneyFormatter($order->value, $order->currency) }}</td>
                <td>{{ $order->status }}</td>
                <td title="{{ $order->created_at->diffForHumans() }}">{{ $order->created_at }}</td>
                @if($order->status == "pending")
                    <td><a href="{{ route('settings.orders.delete', ['order' => $order->reference]) }}">Peruuta tilaus</a></td>
                @endif
            </tr>
        </tbody>
    </table>
</div>

<h3>List of items</h3>
@if(count($order_items) > 0)
    <div class="table-responsive">
        <form method="post" action="{{ route('order.seats', ['order' => $order->reference]) }}">
            {{ csrf_field() }}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>{{ Helper::tra('settings.order.item-title') }}</td>
                        <td>{{ Helper::tra('settings.order.value') }}</td>
                        <td>{{ Helper::tra('settings.order.seating-code') }}</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order_items as $order_item)
                        <tr>
                            <td>{{ $order_item->title }}</td>
                            <td>{{ Helper::decimalMoneyFormatter($order_item->value, $order->currency) }}</td>
                            @if($order_item->ticket->is_seatable == 1)
                                @if(count($seat = Tikematic\Models\Seat::where('order_item_id', $order_item->id)->get()) > 0)
                                    <td>{{ $seat->name }}</td>
                                @else
                                    <td>
                                        <select class="form-control" name="seat[{{ $order_item->id }}]">
                                            <option>Valitse paikka</option>
                                            @foreach(Tikematic\Models\Seat::status("available")->get() as $seat)
                                                <option value="{{ $seat->id }}">{{ $seat->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                @endif
                            @else
                                <td>N/A</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <input type="submit" class="btn btn-primary">
        </form>
    </div>
@else
    <p>{{ Helper::tra('settings.orders.no-items') }}</p>
@endif
@endsection
