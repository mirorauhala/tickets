@extends('layouts.settings')

@section('settings.title', Helper::tra('settings.panel.title.orders'))

@section('content')

@if(count($orders) > 0)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>{{ Helper::tra('settings.orders.code') }}</td>
                    <td>{{ Helper::tra('settings.orders.title') }}</td>
                    <td>{{ Helper::tra('settings.orders.amount') }}</td>
                    <td>{{ Helper::tra('settings.orders.status') }}</td>
                    <td>{{ Helper::tra('settings.orders.date') }}</td>
                    <td>{{ Helper::tra('settings.orders.action') }}</td>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr class="{{ ($order->status == "pending") ? "info" : "" }}">
                        <td>{{ $order->code }}</td>
                        <td>{{ $order->title }}</td>
                        <td>{{ Helper::decimalMoneyFormatter($order->total, $order->currency) }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td><a href="#">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>{{ Helper::tra('settings.orders.no-transactions') }}</p>
@endif
@endsection
