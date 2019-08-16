@extends('layouts.base')

@section('base.title', tra('order.title'))

@section('base.content')
<div class="container h-100">
    <div class="row pb-5 pt-4">
        <div class="col-md-12">
            <p class="mb-2"><a href="{{ route('order.index') }}" class="text-muted">&laquo; {{ tra('order.back') }}</a></p>
            <h1>{{ tra('order.title') }}<small class="text-muted"> / {{ $order->reference }}</small></h1>
            <p class="lead"></p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">{{ tra('order.parent.reference') }}</th>
                            <td>{{ $order->reference }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ tra('order.parent.date') }}</th>
                            <td title="{{ $order->created_at->diffForHumans() }}">{{ $order->created_at }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ tra('order.parent.value') }}</th>
                            <td>{{ money($order->value, $order->currency) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ tra('order.parent.status') }}</th>
                            <td>{{ tra('order.status.' . $order->status) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h3 class="pt-3">{{ tra('order.list-of-products') }}</h3>

            @if(count($order->items) > 0)
                <div class="table-responsive">
                    {{ csrf_field() }}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>{{ tra('order.table.item') }}</td>
                                <td>{{ tra('order.table.value') }}</td>
                                <td>{{ tra('order.table.seating-code') }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $key=>$order_item)
                                <tr>
                                    <td>{{ $order_item->title }}</td>
                                    <td>{{ money($order_item->value, $order->currency) }}</td>
                                    @if($order_item->ticket->is_seatable == 1 && $order_item->seat !== null)
                                        <td>{{ $order_item->seat->name }}</td>
                                    @else
                                        <td>N/A</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>{{ tra('order.no-items') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection
