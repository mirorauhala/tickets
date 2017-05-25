@extends('layouts.tickets')

@section('content')

<div class="row">
@if(count($tickets) > 0)
    @foreach($tickets as $ticket)
        <div class="col-lg-5 col-md-6 col-sm-6">

            <div class="ticket-card">
                <div class="ticket-details">
                    <h1>{{ $ticket->title }}</h1>
                    <p class="text-muted">{{ $ticket->reference }}</p>
                    <p>Paid and assigned</p>
                </div>

                <a href="#" class="ticket-action"><span>View ticket</span></a>
            </div>
        </div>
    @endforeach
@else
    <p>There are no tickets to show at this time.</p>
@endif
</div>
@endsection
