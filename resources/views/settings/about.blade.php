@extends('layouts.base')

@section('base.title', __('settings.title'))

@section('base.content')
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-5xl font-bold mb-3">{{ __('settings.title') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-3 mb-3">
            @include('settings._menu')
        </div>
        <div class="col-12 col-md-8 md-offset-1">
            <h2>{{ __('settings.about.title') }}</h2>
            <p>{{ __('settings.about.current-commit') }} {{ current_commit() }}</p>
        </div>
    </div>
</div>
@endsection
