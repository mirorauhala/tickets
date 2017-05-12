@extends('layouts.base')

@section('base.title', 'Settings')

@section('base.content')

@include('partials.nav.sidebar')

<section class="application">
    <section class="application-header">
        <div class="container">
            <h1>{{ __('settings.header') }}</h1>

            @include("partials.nav.settings")
        </div>
    </section>

    <section class="application-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">@yield('settings.title', 'Untitled')</div>

                        <div class="panel-body">

                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
