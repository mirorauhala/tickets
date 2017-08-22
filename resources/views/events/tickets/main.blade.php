@extends('layouts.event')

@section('content')

<h1>{{ Helper::tra('event.pages.tickets.title') }}</h1>

<br>
<div class="row">
    @if(count($tickets) > 0)
        @foreach($tickets as $ticket)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="ticket">
                    <div class="ticket-heading">
                        <h1>{{ $ticket->name }}</h1>
                    </div>

                    <div class="ticket-meta">
                        <p>{{ $ticket->event->name }}</p>
                    </div>

                    <div class="ticket-body">
                        <div class="ticket-price">
                            <h2>{{ Helper::tra('tickets.card.price') }}</h2>
                            <p>{{ Helper::decimalMoneyFormatter($ticket->price, "EUR") }}</p>
                        </div>
                    </div>

                    <div class="ticket-actions">
                        <a class="ticket-details" href="{{ route('events.tickets.ticket', ['ticket' => $ticket->id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" /></svg>
                            <span>{{ Helper::tra('tickets.card.action-book') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>{{ Helper::tra('event.pages.tickets.no-tickets')}}
    @endif
</div>
@endsection
