@extends('layouts.base')

@section('base.title', tra('settings.title'))

@section('base.content')
<div class="container mx-auto">
    <div class="w-full">
        <h1 class="text-5xl font-bold mb-3">{{ tra('settings.title') }}</h1>
    </div>
    <div class="flex">
        <div class="w-3/12">
            @include('settings._menu')
        </div>
        <div class="w-9/12">
            <h2>{{ tra('settings.about.title') }}</h2>
            <p>{{ tra('settings.about.current-commit') }} {{ current_commit() }}</p>
        </div>
    </div>
</div>
@endsection
