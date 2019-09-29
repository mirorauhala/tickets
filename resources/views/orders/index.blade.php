@extends('layouts.base')

@section('base.title', tra('orders.title'))

@section('base.content')
<div class="tw-container tw-mx-auto">
    <div class="row pb-5 pt-4">
        <div class="col-md-12">
            <h1>{{ tra('orders.title') }}</h1>
            <p class="lead">{{ tra('orders.lead') }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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
                                    <td><a href="{{ route('orders.show', ['order' => $order]) }}">{{ tra('orders.action') }}</a></td>
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
@endsection
