@extends('layouts.base')

@section('base.title', 'Featured')

@section('base.content')
<div class="container mx-auto">
    <div class="row pb-5">
        <div class="col-md-12">
            <p class="lead mb-0">{{ $event->name }}</p>
            <h1 class="mt-0 text-uppercase">{{ tra('dashboard.nav.orders') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('dashboard._menu')
        </div>

        @if(count($orders) > 0 )
            <div class="col-md-9">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Reference</th>
                            <th scope="col">Name</th>
                            <th scope="col">Value</th>
                            <th scope="col">Tickets</th>
                            <th scope="col">Status</th>
                            <th scope="col">Time of purchase</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->reference }}</td>
                                <td>{{ $order->payer_name }}</td>
                                <td>{{ money($order->value, $order->currency) }}</td>
                                <td>{{ $order->items->count() }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                <td>Edit</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="col-md-9 align-self-center">
                <p class="lead text-muted text-center">Wait until a customer purchases a ticket.</p>
            </div>
        @endif
    </div>
</div>
@endsection
