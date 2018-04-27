@extends('layouts.base')

@section('base.content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row justify-content-center align-items-center h-25">
            <div class="col-md-10">
                <h1>Orders</h1>
                <p class="lead">These are your orders.</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(count($orders) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ tra('orders.reference') }}</th>
                                    <th>{{ tra('orders.value') }}</th>
                                    <th>{{ tra('orders.status') }}</th>
                                    <th>{{ tra('orders.date') }}</th>
                                    <th>{{ tra('orders.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->reference }}</td>
                                        <td>{{ money($order->value, $order->currency) }}</td>
                                        <td>{{ tra('orderStatus.' . $order->status) }}</td>
                                        <td title="{{ $order->created_at->diffForHumans() }}">{{ $order->created_at }}</td>
                                        <td><a href="{{ route('orders.show', ['order' => $order->reference]) }}">{{ tra('orders.view-order') }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>{{ tra('orders.no-transactions') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
