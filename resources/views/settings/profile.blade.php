@extends('layouts.settings')

@section('settings.title', __('settings.panel.title.profile'))

@section('content')
<form class="form-horizontal" method="post" action="{{ route('settings.profile') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="inputFirstName" class="col-sm-2 control-label">{{ __('settings.profile.first-name') }}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="Your first name" value="{{ Auth::user()->first_name }}">

            @if ($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="inputLastName" class="col-sm-2 control-label">{{ __('settings.profile.last-name') }}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Your last name" value="{{ Auth::user()->last_name }}">

            @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="inputEmail" class="col-sm-2 control-label">{{ __('settings.profile.email') }}</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Your email address" value="{{ Auth::user()->email }}">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
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
