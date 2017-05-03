@extends('layouts.base')

@section('base.content')

@include('partials.nav.sidebar')
<section class="application">
    <div class="container">
        @yield('content')
    </div>
</section>
@endsection
