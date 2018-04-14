@extends('layouts.auth')

@section('base.title', tra('errors.method-not-allowed.title'))

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">{{ tra('errors.method-not-allowed.title') }}</h1>
        <p class="lead text-center">{{ tra('errors.method-not-allowed.subtext') }}</p>
    </div>
</div>
@endsection
