@extends('layouts.settings')

@section('settings.title', Helper::tra('settings.orders.title'))

@section('content')

@if(count($orders) > 0)
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
                @foreach($orders as $order)
                    <tr class="{{ ($order->status == "pending") ? "info" : "" }}">
                        <td>{{ $order->reference }}</td>
                        <td>{{ Helper::decimalMoneyFormatter($order->value, $order->currency) }}</td>
                        <td>{{ $order->status }}</td>
                        <td title="{{ $order->created_at->diffForHumans() }}">{{ $order->created_at }}</td>
                        <td><a href="{{ route('settings.orders.specific', ['order' => $order->reference]) }}">View full order</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>{{ Helper::tra('settings.orders.no-transactions') }}</p>
@endif
@endsection
