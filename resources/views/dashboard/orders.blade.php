@extends('layouts.base')

@section('base.title', 'Featured')

@section('base.content')
<div class="container">
    <div class="row pb-5">
        <div class="col-md-12">
            <p class="lead mb-0">{{ $event->name }}</p>
            <h1 class="mt-0 text-uppercase">Orders</h1>
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
                            <th scope="col">Price</th>
                            <th scope="col">In sale</th>
                            <th scope="col">Off sale</th>
                            <th scope="col">Quota</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->reference }}</td>
                                <td>{{ $ticket->price }}</td>
                                <td>{{ $ticket->price }}</td>
                                <td>{{ $ticket->price }}</td>
                                <td>{{ $ticket->reserved }}</td>
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
