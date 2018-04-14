@extends('layouts.base')

@section('base.title', tra('settings.header'))

@section('base.content')

@include('partials.nav.sidebar')
<section class="application">

    <section class="application-header">
        <div class="application-container">
            <div class="application-header-wrapper">
                <h1>{{ tra('settings.header') }}</h1>
            </div>
        </div>
    </section>

    @include("partials.nav.settings")

    <section class="application-contents">
        <div class="application-container">
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
