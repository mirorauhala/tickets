@extends('layouts.base')

@section('base.title', 'Connection Lan')

@section('base.content')

@include('partials.nav.sidebar')

<section class="application">
    @include('partials.nav.topbar')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Connection Lan</h1>
                <p class="text-center lead">
                    Ankkalinnantie 13, 131313 Seinäjoki, Finland
                    <a target="_blank" rel="noopener" href="https://maps.google.com/?q=OmaSp+Stadion,+Alaseinäjoenkatu,+Seinäjoki,+Finland">
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
