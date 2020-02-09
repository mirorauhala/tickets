@extends('layouts.base')

@section('base.title', tra('dashboard.nav.tournaments'))

@section('base.content')
<div class="container">
    <div class="row pb-5">
        <div class="col-md-12">
            <p class="lead mb-0">{{ $event->name }}</p>
            <h1 class="mt-0 text-uppercase">{{ tra('dashboard.nav.tournaments') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('dashboard._menu')
        </div>

        @if(count($tournaments) > 0 )
            <div class="col-md-9">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{ tra('dashboard.tournaments.table.name') }}</th>
                            <th scope="col">{{ tra('dashboard.tournaments.table.price') }}</th>
                            <th scope="col">{{ tra('dashboard.tournaments.table.vat') }}</th>
                            <th scope="col">{{ tra('dashboard.tournaments.table.in-sale') }}</th>
                            <th scope="col">{{ tra('dashboard.tournaments.table.off-sale') }}</th>
                            <th scope="col">{{ tra('dashboard.tournaments.table.quota') }}</th>
                            <th scope="col">{{ tra('dashboard.tournaments.table.edit') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tournaments as $tournament)
                            <tr>
                                <td>{{ $tournament->name }}</td>
                                <td>{{ $tournament->registration_start }}</td>
                                <td>{{ $tournament->registration_end }}</td>
                                <td><a href="{{ route('dashboard.tournaments.show', [$event, $tournament]) }}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="col-md-9 align-self-center">
                <p class="lead text-muted text-center">{{ tra('dashboard.tournaments.no-tournaments') }}</p>
                <p class="lead text-muted text-center"><a href="{{ route('dashboard.tournaments.create', ['event' => $event]) }}" class="btn btn-primary px-4">New tournament</a></p>
            </div>
        @endif
    </div>
</div>
@endsection
