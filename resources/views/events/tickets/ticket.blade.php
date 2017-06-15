@extends('layouts.event')

@section('content')

<h1>{{ Helper::tra('event.pages.tickets.title') }}</h1>

<p>{{ Helper::tra('event.pages.tickets.payment-note') }}</p>
<br>

@if(count($errors) > 0)
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

@if(count($ticket) > 0)

    <h2>{{ $ticket->name }}</h2>
    <p>Hinta per lippu: {{ Helper::decimalMoneyFormatter($ticket->price, "EUR") }}</p>
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
