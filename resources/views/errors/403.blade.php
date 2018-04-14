@extends('layouts.auth')

@section('base.title', tra('errors.forbidden.title'))

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">{{ tra('errors.forbidden.title') }}</h1>
        <p class="lead text-center">{{ tra('errors.forbidden.subtext') }}</p>
    </div>
</div>
@endsection
