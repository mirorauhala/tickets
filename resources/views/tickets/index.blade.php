@extends('layouts.base')

@section('base.title', __('tickets.title'))

@section('base.content')
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-5xl font-bold mb-3">{{ __('tickets.title') }}</h1>
        </div>
    </div>
    <div class="row">
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
                            <li class="list-group-item">{{ __('tickets.card.price') }}: {{ money($ticket->value, "EUR") }}</li>
                            @if($ticket->seat)
                                <li class="list-group-item">{{ __('tickets.card.seating-code') }}: {{ $ticket->seat->name }}</li>
                            @endif
                        </ul>
                        @can('update', $ticket)
                        <div class="card-body">
                            <a href="{{ route('orders.show', ['order' => $ticket->order ]) }}" class="card-link">{{ __('tickets.card.show-order') }}</a>
                        </div>
                        @endcan
                    </div>
                </div>
            @endforeach
        @else
            <div class="col">
                <p class="lead text-muted">{{ __('tickets.no-paid') }}</p>
            </div>
        @endif
    </div>
</div>
@endsection
