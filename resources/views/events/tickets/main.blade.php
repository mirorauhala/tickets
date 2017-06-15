@extends('layouts.event')

@section('content')

<h1>{{ Helper::tra('event.pages.tickets.title') }}</h1>

<br>
<div class="row">
    @foreach($tickets as $ticket)
        <div class="col-md-5">
            <a class="thumbnail clearfix" href="{{ route('events.tickets.ticket', ['ticket' => $ticket->id]) }}">
                <div class="col-md-12">
                    <h2>{{ $ticket->name }}</h2>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection
