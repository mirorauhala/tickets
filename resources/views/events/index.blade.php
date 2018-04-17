@extends('layouts.base')

@section('base.content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row align-items-center h-25">
            <div class="col-md-12">
                <h1>{{ $event->name }}</h1>
                <p class="lead">{{ $event->location }} {{ $event->date }}</h1>
            </div>
        </div>
        <div class="row h-25">

        @if(count($tickets) > 0)
            @foreach($tickets as $ticket)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ticket->name}}</h5>
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


    </div>
</div>

@if((Auth::user() && Auth::user()->events->contains('id', $event->id)))
    @yield('content')
@elseif($event->is_visible == 0)
    <h1>{{ tra('event.pages.not-published.title') }}</h1>
    <p class="lead">{{ tra('event.pages.not-published.subtext') }}</p>
@else
    @yield('content')
@endif

@if(count($tickets) > 0)

    <h2>{{ $ticket->name }}</h2>
    <p>Hinta per lippu: {{ money($ticket->price, "EUR") }}</p>
    <form action="{{ route('events.tickets.ticket', ['ticket' => $ticket->id]) }}" method="post">

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ticket_amount">Määrä</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default subtractOne" type="button">-</button>
                        </span>
                        <input type="number" id="ticket_amount" name="ticket_amount" class="form-control" style="height: 39px;" min="0" max="{{ $ticket->maxAmountPerTransaction }}" value="0">
                        <span class="input-group-btn">
                            <button class="btn btn-default addOne" type="button">+</button>
                        </span>
                    </div><!-- /input-group -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <input class="btn btn-primary" type="submit" value="Siirry maksuun">
            </div>
        </div>
        {{ csrf_field() }}
        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
    </form>


@else
    <p class="lead">Tämä lippu ei vielä myynnissä.</p>
@endif

@endsection
