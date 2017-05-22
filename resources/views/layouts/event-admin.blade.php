@extends('layouts.base')

@section('base.title', 'Event Admin')

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

    @include('partials.nav.topbar-admin')

    <section class="application-contents">
        <div class="application-container">


            @include('partials.messages.event-availability')
            @include('partials.messages.flashbox')

            <div class="row">
                <div class="col-md-12">
                    @yield('admin.content')
                </div>
            </div>

        </div>
    </section>

</section>
@endsection
