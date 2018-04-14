@extends('layouts.auth')

@section('base.title', tra('errors.internal-server-error.title'))

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">{{ tra('errors.internal-server-error.title') }}</h1>
        <p class="lead text-center">{{ tra('errors.internal-server-error.subtext') }}.</p>
    </div>
</div>
@endsection
