@extends('layouts.event')

@section('base.title', 'Event Admin')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('partials.nav.event-admin')
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-body">
                    @yield('admin.content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
