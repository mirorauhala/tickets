@extends('layouts.base')

@section('base.content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row justify-content-center align-items-center h-25">
            <div class="col-md-10">
                <p class="mb-2"><a href="{{ route('orders') }}" class="text-muted">&laquo; Back</a></h1>
                <h1>Orders<small class="text-muted"> / {{ $order->reference }}</small></h1>
                <p class="lead"></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">Reference</th>
                                <td>{{ $order->reference }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Date</th>
                                <td title="{{ $order->created_at->diffForHumans() }}">{{ $order->created_at }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Value</th>
                                <td>{{ money($order->value, $order->currency) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td>{{ tra('orderStatus.' . $order->status) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if($order->status == "pending")
                    <p><a class="btn btn-primary px-4" href="{{ route('orders.delete', ['order' => $order->reference]) }}">Peruuta tilaus</a></p>
                @endif

<h3 class="pt-3">Lista tuotteista</h3>

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        {{ dump($error) }}
    @endforeach
@endif

@if(count($order->items) > 0)
    <div class="table-responsive">
        <form method="post" action="{{ route('order.seats', ['order' => $order->reference]) }}">
            {{ csrf_field() }}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>{{ tra('order.item-title') }}</td>
                        <td>{{ tra('order.value') }}</td>
                        <td>{{ tra('order.seating-code') }}</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $key=>$order_item)
                        <tr>
                            <td>{{ $order_item->title }}</td>
                            <td>{{ money($order_item->value, $order->currency) }}</td>
                            @if($order_item->ticket->is_seatable == 1)
                                @if($order_item->seat !== null)
                                    <td>{{ $order_item->seat->name }}</td>
                                @else
                                    <td>

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
    <p>{{ tra('orders.no-items') }}</p>
@endif
        </div>
    </div>
</div>
@endsection
