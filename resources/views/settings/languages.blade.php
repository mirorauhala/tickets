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
            @include('partials.messages.flashbox')
            <form method="post" action="{{ route('settings.language') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="language">{{ tra('settings.language.language') }}</label>
                    <select class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="language" id="language">
                        <option value="none" {!! (Auth::user()->language == "") ? "selected='true'" : "" !!}>{{ tra('language.automatic') }}</option>
                        <option value="en" {!! (Auth::user()->language == "en") ? "selected='true'" : "" !!}>{{ tra('language.english') }}</option>
                        <option value="fi" {!! (Auth::user()->language == "fi") ? "selected='true'" : "" !!}>{{ tra('language.finnish') }}</option>
                    </select>

                    @if ($errors->has('language'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('language') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary px-4" value="{{ tra('form.button.change') }}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
