@extends('layouts.base')

@section('base.title', 'Tournaments')

@section('base.content')

@include('partials.nav.bar')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Tournaments</h1>

            <br>
        </div>
    </div>
    <div class="row">
        @yield('content')
    </div>
</div>
@endsection
