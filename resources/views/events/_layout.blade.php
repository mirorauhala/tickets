@extends('layouts.base')

@section('base.title', 'Connection Lan')

@section('base.content')
@include('partials.nav.sidebar')

<section class="application">

    <section class="application-header application-header-image">
        <div class="application-container">
            <div class="application-header-wrapper">
                <h1>{{ $event->name }}</h1>
                <p>OmaSp Stadion, Seinäjoki, Finland.</p>
                <p>29.9. - 1.10.2017</p>
            </div>
        </div>
    </section>

    @include('partials.nav.topbar')

    <section class="application-contents">
        <div class="application-container">
            @if((Auth::user() && Auth::user()->events->contains('id', $event->id)))
                @yield('content')
            @elseif($event->is_visible == 0)
                <h1>{{ tra('event.pages.not-published.title') }}</h1>
                <p class="lead">{{ tra('event.pages.not-published.subtext') }}</p>
            @else
                @yield('content')
            @endif
        </div>
    </section>

</section>
@endsection
