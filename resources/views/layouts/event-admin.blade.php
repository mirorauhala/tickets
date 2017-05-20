@extends('layouts.event')

@section('base.title', 'Event Admin')

@section('content')

@include('partials.messages.event-availability')
@include('partials.messages.flashbox')

<div class="row">
    <div class="col-md-3">
        @include('partials.nav.event-admin')
    </div>
    <div class="col-md-9">
        @yield('admin.content')
    </div>
</div>
@endsection
