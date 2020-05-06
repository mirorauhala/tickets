@extends('layouts.base')

@section('base.title', __('order.title'))

@section('base.content')
<div class="container">
    <div class="row pb-5 pt-4">
        <div class="col-md-12">
            <p class="mb-2"><a href="{{ route('order.index') }}" class="text-muted">&laquo; {{ __('order.back') }}</a></p>
            <h1>{{ __('order.title') }}<small class="text-muted"> / {{ $order->reference }}</small></h1>
            <p class="lead"></p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">{{ __('order.parent.reference') }}</th>
                            <td>{{ $order->reference }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('order.parent.date') }}</th>
                            <td title="{{ $order->created_at->diffForHumans() }}">{{ $order->created_at }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('order.parent.value') }}</th>
                            <td>{{ money($order->value, $order->currency) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('order.parent.status') }}</th>
                            <td>{{ __('order.status.' . $order->status) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h3 class="pt-3">{{ __('order.list-of-products') }}</h3>

            @if(count($order->items) > 0)
                <div class="table-responsive">
                    {{ csrf_field() }}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>{{ __('order.table.item') }}</td>
                                <td>{{ __('order.table.value') }}</td>
                                <td>{{ __('order.table.seating-code') }}</td>
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
                <p>{{ __('order.no-items') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection
