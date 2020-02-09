@extends('layouts.base')

@section('base.title', tra('settings.title'))

@section('base.content')
<div class="container">
    <div class="w-full">
        <h1 class="text-5xl font-bold mb-3">{{ tra('settings.title') }}</h1>
    </div>
    <div class="flex">
        <div class="w-3/12">
            @include('settings._menu')
        </div>
        <div class="w-9/12">
            <settings-account
                first_name="{{ Auth::user()->first_name }}"
                last_name="{{ Auth::user()->last_name }}"
                email="{{ Auth::user()->email }}"
                phone="{{ Auth::user()->phone }}"
            />
        </div>
    </div>
</div>
@endsection
