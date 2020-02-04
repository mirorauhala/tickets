@extends('layouts.base')

@section('base.title', tra('tickets.title'))

@section('base.content')
<div class="container mx-auto">
    <div class="w-full">
        <h1 class="text-5xl font-bold mb-3">{{ tra('tickets.title') }}</h1>
    </div>
    <div class="w-full">
        @if(count($tickets) > 0)
            @foreach($tickets as $ticket)
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ticket->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $ticket->order->event->name }}</h6>
                            <qr-code text="{{ $ticket->barcode }}" :size="200" bg-color="transparent"></qr-code>
                            <p class="text-muted">{{ $ticket->barcode }}</p>

                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ tra('tickets.card.price') }}: {{ money($ticket->value, "EUR") }}</li>
                            @if($ticket->seat)
                                <li class="list-group-item">{{ tra('tickets.card.seating-code') }}: {{ $ticket->seat->name }}</li>
                            @endif
                        </ul>
                        @can('update', $ticket)
                        <div class="card-body">
                            <a href="{{ route('orders.show', ['order' => $ticket->order ]) }}" class="card-link">{{ tra('tickets.card.show-order') }}</a>
                        </div>
                        @endcan
                    </div>
                </div>
            @endforeach
        @else
            <p class="lead text-muted text-center">{{ tra('tickets.no-paid') }}</p>
        @endif
    </div>
</div>
@endsection
