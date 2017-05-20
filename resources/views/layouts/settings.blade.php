@extends('layouts.base')

@section('base.title', __('settings.header'))

@section('base.content')

@include('partials.nav.sidebar')

<section class="application">
    <section class="application-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ __('settings.header') }}</h1>

                    @include("partials.nav.settings")
                </div>
            </div>
        </div>
    </section>

    <section class="application-container">
        <div class="container">
            @include('partials.messages.flashbox')
            <div class="row">
                <div class="col-md-12">
                    <h2>@yield('settings.title', 'Untitled')</h2>

                    @yield('content')
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
