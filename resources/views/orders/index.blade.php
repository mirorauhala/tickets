@extends('layouts.base')

@section('base.title', __('orders.title'))

@section('base.content')
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-5xl font-bold mb-3">{{ __('orders.title') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if(count($orders) > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('orders.table.reference') }}</th>
                                <th>{{ __('orders.table.value') }}</th>
                                <th>{{ __('orders.table.status') }}</th>
                                <th>{{ __('orders.table.date') }}</th>
                                <th>{{ __('orders.table.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->reference }}</td>
                                    <td>{{ money($order->value, $order->currency) }}</td>
                                    <td>{{ __('order.status.' . $order->status) }}</td>
                                    <td title="{{ $order->created_at->diffForHumans() }}">{{ $order->created_at }}</td>
                                    <td><a href="{{ route('orders.show', ['order' => $order]) }}">{{ __('orders.action') }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="lead text-muted">{{ __('orders.no-transactions') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection
