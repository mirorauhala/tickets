@extends('layouts.base')

@section('base.content')

@include('partials.nav.sidebar')
<section class="application">
    <section class="application-contents">
        <div class="container">
            @yield('content')
        </div>
    </section>
</section>
@endsection
