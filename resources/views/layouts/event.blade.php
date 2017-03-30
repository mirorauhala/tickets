@extends('layouts.base')

@section('base.title', 'Event')

@section('base.content')

@include('partials.nav.bar')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Connection Lan: eSports 2017</h1>

            <p class="text-center lead">
                Alaseinäjoenkatu 15, 60220 Seinäjoki, Finland
                <a target="_blank" href="https://maps.google.com/?q=OmaSp+Stadion,+Alaseinäjoenkatu,+Seinäjoki,+Finland">
                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <span class="sr-only">View in Google Maps</span>
                </a>
            </p>

            <p class="text-center">
                <a role="presentation" class="btn btn-sm {{ Helper::route_active(['events.details'], 'btn-primary', 'btn-link') }}" href="{{ route('events.details') }}" href="{{ route('events.details') }}">Details</a></li>

                <a role="presentation" class="btn btn-sm {{ Helper::route_active(['events.maps*'], 'btn-primary', 'btn-link') }}" href="{{ route('events.maps') }}">Maps</a></li>

                <a role="presentation" class="btn btn-sm {{ Helper::route_active(['events.tickets*'], 'btn-primary', 'btn-link') }}" href="{{ route('events.tickets') }}">Tickets</a></li>

                <a role="presentation" class="btn btn-sm {{ Helper::route_active(['events.tournaments*'], 'btn-primary', 'btn-link') }}" href="{{ route('events.tournaments') }}">Tournaments</a></li>

            </p>

            <br>

            @yield('content')
        </div>
    </div>
</div>
@endsection
