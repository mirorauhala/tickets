@extends('layouts.settings')

@section('settings.title', tra('settings.panel.title.change-password'))

@section('content')
<form method="post" action="{{ route('settings.password') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
        <label for="current_password" class="control-label">{{ tra('settings.change-password.current') }}</label>
        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Your current password">

        @if ($errors->has('current_password'))
            <span class="help-block">
                <strong>{{ $errors->first('current_password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
        <label for="new_password" class="control-label">{{ tra('settings.change-password.new') }}</label>
        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Your new password (min. 6 characters)">

        @if ($errors->has('new_password'))
            <span class="help-block">
                <strong>{{ $errors->first('new_password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
        <label for="new_password_confirmation" class="control-label">{{ tra('settings.change-password.confirmation') }}</label>
        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Verify your new password">

        @if ($errors->has('new_password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('new_password_confirmation') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">{{ tra('form.button.change') }}</button>
    </div>
</form>
@endsection
