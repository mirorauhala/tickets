@extends('layouts.base')

@section('base.title', tra('errors.not-found.title'))

@section('base.content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row justify-content-center h-75">
            <div class="col-md-10 align-self-center">
                <h1 class="text-center">{{ tra('errors.not-found.title') }}</h1>
                <p class="lead text-center">{{ tra('errors.not-found.subtext') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
