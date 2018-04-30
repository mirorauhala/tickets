@extends('layouts.base')

@section('base.title', tra('orders.title'))

@section('base.content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row justify-content-center align-items-center h-25">
            <div class="col-md-10">
                <h1>{{ tra('orders.title') }}</h1>
                <p class="lead">{{ tra('orders.lead') }}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(count($orders) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ tra('orders.table.reference') }}</th>
                                    <th>{{ tra('orders.table.value') }}</th>
                                    <th>{{ tra('orders.table.status') }}</th>
                                    <th>{{ tra('orders.table.date') }}</th>
                                    <th>{{ tra('orders.table.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->reference }}</td>
                                        <td>{{ money($order->value, $order->currency) }}</td>
                                        <td>{{ tra('order.status.' . $order->status) }}</td>
                                        <td title="{{ $order->created_at->diffForHumans() }}">{{ $order->created_at }}</td>
                                        <td><a href="{{ route('orders.show', ['order' => $order->reference]) }}">{{ tra('orders.action') }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="lead text-muted">{{ tra('orders.no-transactions') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
