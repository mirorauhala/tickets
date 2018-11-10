@extends('layouts.event-admin')

@section('admin.content')
    <h1 id="adminTitle">{{ tra('event.admin.pages.tickets.list.title') }}</h1>
    <p><a href="{{ route('events.admin.tickets.new') }}" class="btn btn-primary">{{ tra('event.admin.pages.tickets.list.create-ticket') }}</a></p>
    @if(count($tickets) > 0)
        <div class="table-responsive">
            <table class="table table-condensed table-bordered">

                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Price</td>
                        <td>VAT</td>
                        <td>Amount of tickets reserved</td>
                        <td>Max. transaction amount?</td>
                        <td>Available at</td>
                        <td>Unavailable at</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->name }}</td>
                            <td>{{ money($ticket->price, "EUR") }}</td>
                            <td>{{ $ticket->vat }}</td>
                            <td>{{ $ticket->reserved }}</td>
                            <td>{{ $ticket->maxAmountPerTransaction }}</td>
                            <td title="{{ $ticket->availableAt->diffForHumans() }}">{{ $ticket->availableAt }}</td>
                            <td title="{{ $ticket->unavailableAt->diffForHumans() }}">{{ $ticket->unavailableAt }}</td>
                            <td><a href="{{ route('events.admin.tickets.edit', ['id' => $ticket->id ]) }}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    @else
        <p>{{ tra('event.admin.pages.tickets.list.no-tickets') }}</p>
    @endif



@endsection
