@extends('layouts.event')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Tickets</h1>
    </div>
</div>

<br>

@if(count($tickets) > 0)
    @foreach($tickets as $ticket)
    <div class="row ticket">
        <div class="col-sm-4 col-xs-9">
            <h5>{{ $ticket->name }}</h5>
            <ul>
                <li>Cool feature no. 1 you'll get by choosing this ticket.</li>
                <li>Cool feature no. 2 you'll get by choosing this ticket.</li>
            </ul>
        </div>
        <div class="col-sm-4 col-xs-3 text-right">
            {{ Helper::decimalMoneyFormatter($ticket->price, $ticket->currency) }}
        </div>
        <div class="col-md-2 col-md-offset-2 col-sm-4 col-sm-offset-0 col-xs-5 col-xs-offset-7">
            <input type="number" min="0" max="{{ $ticket->maxAmountPerTransaction }}" value="0">
        </div>
    </div>
    @endforeach

    <div class="row ticket">
        <div class="col-sm-4 col-xs-9">

        </div>
        <div class="col-sm-4 col-xs-3 text-right">

        </div>
        <div class="col-md-2 col-md-offset-2 col-sm-4 col-sm-offset-0 col-xs-5 col-xs-offset-7">
            <input type="submit" class="btn btn-block btn-primary" value="Purchase">
        </div>
    </div>
@else
    <p class="text-center">There are no tickets to show.</p>
@endif


@endsection
