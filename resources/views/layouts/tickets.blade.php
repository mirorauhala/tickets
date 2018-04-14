@extends('layouts.base')

@section('base.title', tra('tickets.header'))

@section('base.content')

@include('partials.nav.sidebar')
<section class="application">

    <section class="application-header">
        <div class="application-container">
            <div class="application-header-wrapper">
                <h1>{{ tra('tickets.header') }}</h1>
            </div>
        </div>
    </section>

    @include('partials.nav.topbar-tickets')

    <section class="application-contents">
        <div class="application-container">
            @yield('content')
        </div>
    </section>

</section>
@endsection
