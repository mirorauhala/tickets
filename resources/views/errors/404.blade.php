@extends('layouts.auth')

@section('base.title', tra('errors.not-found.title'))

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">{{ tra('errors.not-found.title') }}</h1>
        <p class="lead text-center">{{ tra('errors.not-found.subtext') }}</p>
    </div>
</div>
@endsection
