@extends('layouts.base')

@section('base.content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row justify-content-center align-items-center h-25">
            <div class="col-md-10">
                <h1>{{ tra('tickets.title') }}</h1>
                <p class="lead">{{ tra('tickets.lead-redeem') }}</h1>
            </div>
            <div class="col-md-10">
                @include('tickets._menu')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <p class="lead text-muted text-center">Feature coming soon!</P>
            </div>
        </div>
    </div>
</div>
@endsection
