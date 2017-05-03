@extends('layouts.base')

@section('base.content')

@include('partials.nav.bar')
<div class="container">
    @yield('content')
</div>
@endsection
