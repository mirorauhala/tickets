@extends('layouts.event')

@section('content')

<div class="row">
    <div class="col-md-12">

        <h1 class="text-center">Tickets</h1>
    </div>
</div>

<div class="row">

    @if(count($tickets) > 0)
        @foreach($tickets as $ticket)
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-heading">{{ $ticket->name }}</div>
                    <div class="panel-body">
                        <ul>
                            <li>{{ Helper::decimalMoneyFormatter($ticket->price, $ticket->currency) }}</li>
                            <li>Unrestricted access to the event venue.</li>
                        </ul>
                        <br>
                        <p><a href="#" class="btn btn-primary">Buy</a></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <p class="text-center">There are no tickets to show.</p>
    @endif

</div>

@endsection
