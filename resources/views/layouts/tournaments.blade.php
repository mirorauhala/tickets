@extends('layouts.base')

@section('base.title', 'Tournaments')

@section('base.content')

@include('partials.nav.sidebar')
<section class="application">
    <section class="application-header">
        <div class="container">
            <h1>{{ __('tournaments.header') }}</h1>
        </div>
    </section>

    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
</section>
@endsection
