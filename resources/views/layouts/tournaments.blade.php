@extends('layouts.base')

@section('base.title', tra('tournaments.header'))

@section('base.content')

@include('partials.nav.sidebar')
<section class="application">
    <section class="application-header">
        <div class="container">
            <h1>{{ tra('tournaments.header') }}</h1>
        </div>
    </section>

    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
</section>
@endsection
