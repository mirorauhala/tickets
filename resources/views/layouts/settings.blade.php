@extends('layouts.base')

@section('base.title', 'Settings')

@section('base.content')

@include('partials.nav.bar')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Settings</h1>

            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include("partials.nav.settings")
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">@yield('settings.title', 'Untitled')</div>

                <div class="panel-body">

                    @yield('content')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
