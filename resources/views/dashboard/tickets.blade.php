@extends('layouts.base')

@section('base.title', 'Featured')

@section('base.content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row align-items-center h-25">
            <div class="col-md-12">
                <h1>Dashboard for {{ $event->name }}</h1>
                <p class="lead">All tickets for this event.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                @include('dashboard._menu')
            </div>

            @if(count($tickets) > 0 )
                <div class="col-md-9">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">{{ tra('dashboard.tickets.table.name') }}</th>
                                <th scope="col">{{ tra('dashboard.tickets.table.price') }}</th>
                                <th scope="col">{{ tra('dashboard.tickets.table.vat') }}</th>
                                <th scope="col">{{ tra('dashboard.tickets.table.in-sale') }}</th>
                                <th scope="col">{{ tra('dashboard.tickets.table.off-sale') }}</th>
                                <th scope="col">{{ tra('dashboard.tickets.table.seatable') }}</th>
                                <th scope="col">{{ tra('dashboard.tickets.table.quota') }}</th>
                                <th scope="col">{{ tra('dashboard.tickets.table.edit') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->name }}</td>
                                    <td>{{ $ticket->price }}</td>
                                    <td>{{ $ticket->vat }}</td>
                                    <td>{{ $ticket->availableAt }}</td>
                                    <td>{{ $ticket->unavailableAt }}</td>
                                    <td>{{ $ticket->seatable ? 'True' : 'False' }}</td>
                                    <td>{{ $ticket->reserved }}</td>
                                    <td><a href="{{ route('dashboard.tickets.view', [$event, $ticket]) }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="col-md-9 align-self-center">
                    <p class="lead text-muted text-center">{{ tra('dashboard.tickets.no-tickets') }}</p>
                    <p class="lead text-muted text-center"><a href="{{ route('dashboard.tickets.create', ['event' => $event]) }}" class="btn btn-primary px-4">New ticket</a></p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
