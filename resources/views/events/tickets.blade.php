@extends('layouts.event')

@section('content')

<h1>{{ __('event.pages.tickets.title') }}</h1>

<br>

@if(count($tickets) > 0)
    <form method="POST" action="{{ route('order.view') }}">
        {{ csrf_field() }}
        @foreach($tickets as $key=>$ticket)
            <div class="row ticket">
                <div class="col-sm-4 col-xs-9">
                    <h2>{{ $ticket->name }}</h2>
                    <ul>
                        <li>Cool feature no. 1 you'll get by choosing this ticket.</li>
                        <li>Cool feature no. 2 you'll get by choosing this ticket.</li>
                    </ul>
                </div>
                <div class="col-sm-4 col-xs-3 text-right">
                    {{ Helper::decimalMoneyFormatter($ticket->price, $event->currency) }}
                </div>
                <div class="col-md-2 col-md-offset-2 col-sm-4 col-sm-offset-0 col-xs-5 col-xs-offset-7">
                    <input type="hidden" name="tickets[{{ $key }}][id]" value="{{ $ticket->id }}">
                    <input type="number" name="tickets[{{ $key }}][amount]" min="0" max="{{ $ticket->maxAmountPerTransaction }}" value="0">
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

    </form>
@else
    <p>{{ __('event.pages.tickets.no-tickets') }}</p>
@endif


@endsection
