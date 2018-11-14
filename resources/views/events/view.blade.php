@extends('layouts.base')

@section('base.title', $event->name)

@section('base.content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-uppercase">{{ $event->name }}</h1>
            <p class="lead">{{ $event->location }} {{ $event->date }}</p>
        </div>
    </div>

    @if(count($errors->all()) > 0)
        @foreach($errors->all() as $error)
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <div class="row">
        @if(count($tickets) > 0)
            @foreach($tickets as $ticket)
                <div class="col-6 col-md-4 col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ticket->name}}</h5>
                            <p class="card-text">Hinta per lippu {{ money($ticket->price, "EUR") }}</p>
                            <form action="{{ route('orders.create', $event) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                <label for="ticket_amount">Määrä</label>
                                <input-counter max="{{ $ticket->maxAmountPerTransaction }}"></input-counter>
                                <input class="btn btn-primary" type="submit" value="Siirry maksuun">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col align-self-center">
                <p class="lead text-center text-muted">There are no tickets to show.</p>
            </div>
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
</div>
@endsection
