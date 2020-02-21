@extends('layouts.base')

@section('base.title', tra('settings.title'))

@section('base.content')
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-5xl font-bold mb-3">{{ tra('settings.title') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-3 mb-3">
            @include('settings._menu')
        </div>
        <div class="col-12 col-md-8 md-offset-1">
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
