@extends('layouts.settings')

@section('settings.title', __('settings.panel.title.language'))

@section('content')
<form class="form-horizontal" method="post" action="{{ route('settings.language') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="inputLanguage" class="col-sm-2 control-label">{{ __('settings.language.language') }}</label>
        <div class="col-sm-5">
            <select class="form-control" name="language" id="inputLanguage">
                <option value="en">{{ __('language.english') }}</option>
                <option value="fi">{{ __('language.finnish') }}</option>
            </select>

            @if ($errors->has('language'))
                <span class="help-block">
                    <strong>{{ $errors->first('language') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">{{ __('form.button.update') }}</button>
        </div>
    </div>
</form>
@endsection
