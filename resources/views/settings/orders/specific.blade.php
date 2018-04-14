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
                <td>{{ Helper::tra('settings.orderStatus.' . $order->status) }}</td>
                <td title="{{ $order->created_at->diffForHumans() }}">{{ $order->created_at }}</td>
                @if($order->status == "pending")
                    <td><a href="{{ route('settings.orders.delete', ['order' => $order->reference]) }}">Peruuta tilaus</a></td>
                @endif
            </tr>
        </tbody>
    </table>
</div>

<h3>Lista tuotteista</h3>

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        {{ dump($error) }}
    @endforeach
@endif

@if(count($order->items) > 0)
    <div class="table-responsive">
        <form method="post" action="{{ route('order.seats', ['order' => $order->reference]) }}">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>{{ Helper::tra('settings.order.item-title') }}</td>
                        <td>{{ Helper::tra('settings.order.value') }}</td>
                        <td>{{ Helper::tra('settings.order.seating-code') }}</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $key=>$order_item)
                        <tr>
                            <td>{{ $order_item->title }}</td>
                            <td>{{ Helper::decimalMoneyFormatter($order_item->value, $order->currency) }}</td>
                            @if($order_item->ticket->is_seatable == 1)
                                @if($order_item->seat !== null)
                                    <td>{{ $order_item->seat->name }}</td>
                                @else
                                    <td>
                                        {{ csrf_field() }}
                                        <input type="hidden" name="seat[{{ $key }}][order_item_id]" value="{{ $order_item->id }}">
                                        <select class="form-control" name="seat[{{ $key }}][seat_id]">
                                            <option value="">Valitse paikka</option>
                                            @foreach(App\Models\Seat::status("available")->ticketType($order_item->ticket->id)->get() as $seat)
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
            @if($show_form_submit)
                <input type="submit" class="btn btn-primary" value="Varaa paikat">
            @endif
        </form>
    </div>
@else
    <p>{{ Helper::tra('settings.orders.no-items') }}</p>
@endif
@endsection
