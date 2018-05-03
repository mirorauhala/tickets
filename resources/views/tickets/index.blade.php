@extends('layouts.base')

@section('base.title', tra('tickets.title'))

@section('base.content')
<div class="container h-100">
    <div class="row h-25 my-3 justify-content-center align-items-center">
        <div class="col-md-12">
            <h1>{{ tra('tickets.title') }}</h1>
            <p class="lead">{{ tra('tickets.lead') }}</h1>

            @include('tickets._menu')
        </div>
    </div>
    <div class="row">
        @if(count($items) > 0)
            @foreach($items as $item)
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $item->order->event->name }}</h6>
                            <qr-code text="{{ $item->barcode }}" :size="200" bg-color="transparent"></qr-code>
                            <p class="text-muted">{{ $item->barcode }}</p>

                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ tra('tickets.card.price') }}: {{ money($item->value, "EUR") }}</li>
                            @if($item->seat)
                                <li class="list-group-item">{{ tra('tickets.card.seating-code') }}: {{ $item->seat->name }}</li>
                            @endif
                        </ul>
                        @can('update', $item)
                        <div class="card-body">
                            <a href="{{ route('tickets.share', ['order' => $item->barcode ]) }}" class="card-link">{{ tra('tickets.card.share-ticket') }}</a>
                            <a href="{{ route('orders.show', ['order' => $item->order->reference ]) }}" class="card-link">{{ tra('tickets.card.show-order') }}</a>
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