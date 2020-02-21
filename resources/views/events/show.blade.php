@extends('layouts.base')

@section('base.title', $event->name)

@section('base.content')
<div class="container pt-5">
    <div class="row pb-5 pt-4">
        <div class="col-12">
            <h1>{{ $event->name }}</h1>
            <p class="lead mb-0">{{ $event->slogan }}</p>
            <p class="lead">{{ $event->location }}</p>
        </div>
        <div class="col-12">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="{{ route('events.show', ['event' => $event]) }}" class="nav-link {{ active('events.show') }}">Liput</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('events.show', ['event' => $event]) }}" class="nav-link {{ active('events.map') }}">Kartta</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('events.show', ['event' => $event]) }}" class="nav-link {{ active('events.about') }}">Tietoa</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        @if(count($tickets) > 0)
            @foreach($tickets as $ticket)
                <div class="w-7/12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="font-bold text-3xl">{{ $ticket->name}} - {{ money($ticket->price, "EUR") }}</h2>
                            <p class="card-text">Alkaen </p>
                            <form action="{{ route('orders.create', $event) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                <label for="ticket_amount">Määrä</label>
                                <input-counter max="{{ $ticket->maxAmountPerTransaction }}"></input-counter>
                                <app-button theme="primary" type="submit">Lisää ostoskoriin</app-button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="lead text-muted">There are no tickets to show.</p>
        @endif
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Kartta</h2>
            <p>Paikkoja yhteensä: {{ count($seats) }}</p>
            <p>Paikkoja vapaana: {{ count($seats->where('status', '=', 'available')) }}</p>
        </div>
    </div>

    <div class="row mb-5 pb-5">
        <div class="table-responsive">
            <div class="map" style="height: 474px; width: 886px;
                background-image: url('/images/background.png');
                background-repeat: no-repeat;
                overflow: auto;">

                @foreach($seats as $seat)
                    <div class="seat seat-{{ $seat->status }}"  style="height: {{ $seat->height }}px; width: {{ $seat->width }}px; top: {{ $seat->top }}px; left: {{ $seat->left }}px;" data-toggle="tooltip" title="{{ $seat->name }}"></div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
