@extends('layouts.base')

@section('base.title', __('errors.not-found.title'))

@section('base.content')
<div class="container">
    <div class="flex flex-col text-center">
        <h1 class="text-4xl font-bold pb-1">{{ __('errors.not-found.title') }}</h1>
        <p class="text-2xl">{{ __('errors.not-found.subtext') }}</p>
    </div>
</div>
@endsection
