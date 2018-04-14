@extends('layouts.settings')

@section('settings.title', tra('settings.panel.title.language'))

@section('content')
<form method="post" action="{{ route('settings.language') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="display_language" class="control-label">{{ tra('settings.language.language') }}</label>
        <select class="form-control" name="display_language" id="display_language">
            <option value="none" {!! (Auth::user()->language == "") ? "selected='true'" : "" !!}>{{ tra('language.automatic') }}</option>
            <option value="en" {!! (Auth::user()->language == "en") ? "selected='true'" : "" !!}>{{ tra('language.english') }}</option>
            <option value="fi" {!! (Auth::user()->language == "fi") ? "selected='true'" : "" !!}>{{ tra('language.finnish') }}</option>
        </select>

        @if ($errors->has('language'))
            <span class="help-block">
                <strong>{{ $errors->first('language') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">{{ tra('form.button.change') }}</button>
    </div>
</form>
@endsection
