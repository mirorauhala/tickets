@extends('layouts.base')

@section('base.title', tra('settings.title'))

@section('base.content')
<div class="container">
    <div class="row pb-5 pt-4">
        <div class="col-md-12">
            <h1>{{ tra('settings.title') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('settings._menu')
        </div>
        <div class="col-md-8 offset-md-1">
            <h2>{{ tra('settings.about.title') }}</h2>
            <p>{{ tra('settings.about.current-commit') }} {{ current_commit() }}</p>
        </div>
    </div>
</div>
@endsection
