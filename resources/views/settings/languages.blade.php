@extends('layouts.base')

@section('settings.title', tra('settings.title'))

@section('base.content')
<div class="container">
    <div class="row py-5">
        <div class="col-md-12">
            <h1 class="text-uppercase">{{ tra('settings.title') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('settings._menu')
        </div>
        <div class="col-md-8 offset-md-1">
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
