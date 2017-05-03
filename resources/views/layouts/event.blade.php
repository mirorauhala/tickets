@extends('layouts.base')

@section('base.title', 'Event')

@section('base.content')

@include('partials.nav.sidebar')

<section class="application">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">
                    <a role="presentation" class="btn btn-sm {{ Helper::route_active(['events.details'], 'btn-link', 'btn-link') }}" href="{{ route('events.details') }}" href="{{ route('events.details') }}">Details</a></li>

                    <a role="presentation" class="btn btn-sm {{ Helper::route_active(['events.maps*'], 'btn-link', 'btn-link') }}" href="{{ route('events.maps') }}">Maps</a></li>

                    <a role="presentation" class="btn btn-sm {{ Helper::route_active(['events.tickets*'], 'btn-link', 'btn-link') }}" href="{{ route('events.tickets') }}">Tickets</a></li>

                    <a role="presentation" class="btn btn-sm {{ Helper::route_active(['events.tournaments*'], 'btn-link', 'btn-link') }}" href="{{ route('events.tournaments') }}">Tournaments</a></li>

                    @can('update', $event)
                        <a role="presentation" class="btn btn-sm {{ Helper::route_active(['events.admin*'], 'btn-link', 'btn-link') }}" href="{{ route('events.admin.customers') }}">Admin</a></li>
                    @endcan

                </p>
                <br>

                <h1 class="text-center">Connection Lan</h1>

                <p class="text-center lead">
                    Ankkalinnantie 13, 131313 Seinäjoki, Finland
                    <a target="_blank" href="https://maps.google.com/?q=OmaSp+Stadion,+Alaseinäjoenkatu,+Seinäjoki,+Finland">
                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <span class="sr-only">View in Google Maps</span>
                    </a>
                </p>
                <br>
                @yield('content')
            </div>
        </div>
    </div>
</section>
@endsection
