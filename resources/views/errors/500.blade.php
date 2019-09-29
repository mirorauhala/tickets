@extends('layouts.base')

@section('base.title', tra('errors.internal-server-error.title'))

@section('base.content')
<div class="tw-container tw-mx-auto">
    <div class="row h-75 justify-content-center">
        <div class="col-md-12 align-self-center">
            <h1 class="text-center">{{ tra('errors.internal-server-error.title') }}</h1>
            <p class="lead text-center">{{ tra('errors.internal-server-error.subtext') }}.</p>
        </div>
    </div>
</div>
@endsection
