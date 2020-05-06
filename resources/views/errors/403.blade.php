@extends('layouts.base')

@section('base.title', __('errors.forbidden.title'))

@section('base.content')
<div class="container">
    <div class="flex flex-col text-center">
        <h1 class="text-4xl font-bold pb-1">{{ __('errors.forbidden.title') }}</h1>
        <p class="text-2xl">{{ __('errors.forbidden.subtext') }}</p>
    </div>
</div>
@endsection
