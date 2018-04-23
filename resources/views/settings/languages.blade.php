@extends('layouts.base')

@section('settings.title', tra('settings.panel.title.language'))

@section('base.content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row justify-content-center align-items-center h-25">
            <div class="col-md-10">
                <h1>{{ tra('settings.title') }}</h1>
                <p class="lead">{{ tra('settings.lead-language') }}</h1>
            </div>
            <div class="col-md-10">
                @include('settings._menu')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form method="post" action="{{ route('settings.language') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="display_language">{{ tra('settings.language.language') }}</label>
                        <select class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="display_language" id="display_language">
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
</div>
@endsection
