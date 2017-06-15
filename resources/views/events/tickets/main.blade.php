@extends('layouts.event')

@section('content')

<h1>{{ Helper::tra('event.pages.tickets.title') }}</h1>

<br>
<div class="row">
    @if(count($tickets) > 0)
        @foreach($tickets as $ticket)
            <div class="col-md-5">
                <a class="thumbnail clearfix" href="{{ route('events.tickets.ticket', ['ticket' => $ticket->id]) }}">
                    <div class="col-md-12">
                        <h2>{{ $ticket->name }}</h2>
                    </div>
                </a>
            </div>
        @endforeach
    @else
        <p>{{ Helper::tra('event.pages.tickets.no-tickets')}}
    @endif
</div>
@endsection
