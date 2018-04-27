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

        @if(count($errors->all()) > 0)
            @foreach($errors->all() as $error)
                <div class="col-md-10">
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                </div>
            @endforeach
        @endif


        @if(count($tickets) > 0)
            @foreach($tickets as $ticket)
                <div class="col-md-4 mb-3">
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


    </div>
</div>



@endsection
