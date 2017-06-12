@extends('layouts.base')

@section('base.content')

@include('partials.nav.sidebar')
<section class="application">
    <section class="application-header">
        <div class="container">
            <h1>@yield('header')</h1>
        </div>
    </section>

    <div class="application-contents">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
</section>
@endsection
