@extends('layouts.settings')

@section('settings.title', tra('settings.orders.title'))

@section('content')

@if(count($orders) > 0)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>{{ tra('settings.orders.reference') }}</td>
                    <td>{{ tra('settings.orders.value') }}</td>
                    <td>{{ tra('settings.orders.status') }}</td>
                    <td>{{ tra('settings.orders.date') }}</td>
                    <td>{{ tra('settings.orders.action') }}</td>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->reference }}</td>
                        <td>{{ money($order->value, $order->currency) }}</td>
                        <td>{{ tra('settings.orderStatus.' . $order->status) }}</td>
                        <td title="{{ $order->created_at->diffForHumans() }}">{{ $order->created_at }}</td>
                        <td><a href="{{ route('settings.orders.show', ['order' => $order->reference]) }}">{{ tra('settings.orders.view-order') }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>{{ tra('settings.orders.no-transactions') }}</p>
@endif
@endsection
