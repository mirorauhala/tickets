@extends('layouts.base')

@section('base.title', tra('dashboard.nav.tickets'))

@section('base.content')
<div class="tw-container tw-mx-auto">
    <div class="row pb-5">
        <div class="col-md-12">
            <p class="lead mb-0">{{ $event->name }}</p>
            <h1 class="mt-0 text-uppercase">{{ tra('dashboard.nav.tickets') }}</h1>
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
                                <td>{{ $ticket->reserved }}</td>
                                <td><a href="{{ route('dashboard.tickets.show', [$event, $ticket]) }}">Edit</a></td>
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
@endsection
