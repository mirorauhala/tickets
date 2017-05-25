@extends('layouts.settings')

@section('settings.title', Helper::tra('settings.panel.title.profile'))

@section('content')
<form method="post" action="{{ route('settings.profile') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="inputFirstName" class="control-label">{{ Helper::tra('settings.profile.first-name') }}</label>

        <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="Your first name" value="{{ Auth::user()->first_name }}">

        @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="inputLastName" class="control-label">{{ Helper::tra('settings.profile.last-name') }}</label>
        <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Your last name" value="{{ Auth::user()->last_name }}">

        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="inputEmail" class="control-label">{{ Helper::tra('settings.profile.email') }}</label>
        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Your email address" value="{{ Auth::user()->email }}">

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">{{ Helper::tra('form.button.update') }}</button>
    </div>
</form>
@endsection
