@extends('layouts.base')

@section('base.title', tra('errors.forbidden.title'))

@section('base.content')
<div class="container h-100">
    <div class="row h-75 justify-content-center">
        <div class="col-md-12 align-self-center">
            <h1 class="text-center">{{ tra('errors.forbidden.title') }}</h1>
            <p class="lead text-center">{{ tra('errors.forbidden.subtext') }}</p>
        </div>
    </div>
</div>
@endsection
