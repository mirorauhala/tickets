@extends('layouts.settings')

@section('settings.title', Helper::tra('settings.panel.title.profile'))

@section('content')
<form method="post" action="{{ route('settings.profile') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="first_name" class="control-label">{{ Helper::tra('settings.profile.first-name') }}</label>

        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Your first name" value="{{ Auth::user()->first_name }}">

        @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="last_name" class="control-label">{{ Helper::tra('settings.profile.last-name') }}</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Your last name" value="{{ Auth::user()->last_name }}">

        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">{{ Helper::tra('settings.profile.email') }}</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Your email address" value="{{ Auth::user()->email }}">

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('street_address') ? ' has-error' : '' }}">
        <label for="street_address" class="control-label">{{ Helper::tra('auth.register.street_address') }}</label>

        <input id="street_address" type="text" class="form-control" name="street_address" value="{{ Auth::user()->street_address }}" required>

        @if ($errors->has('street_address'))
            <span class="help-block">
                <strong>{{ $errors->first('street_address') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
        <label for="postal_code" class="control-label">{{ Helper::tra('auth.register.postal_code') }}</label>

        <input id="postal_code" type="text" class="form-control" name="postal_code" value="{{ Auth::user()->postal_code }}" required>

        @if ($errors->has('postal_code'))
            <span class="help-block">
                <strong>{{ $errors->first('postal_code') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('postal_office') ? ' has-error' : '' }}">
        <label for="postal_office" class="control-label">{{ Helper::tra('auth.register.postal_office') }}</label>

        <input id="postal_office" type="text" class="form-control" name="postal_office" value="{{ Auth::user()->postal_office }}" required>

        @if ($errors->has('postal_office'))
            <span class="help-block">
                <strong>{{ $errors->first('postal_office') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('country_code') ? ' has-error' : '' }}">
        <label for="country_code" class="control-label">{{ Helper::tra('auth.register.country_code') }}</label>

        <select class="form-control" name="country_code" id="country_code" required>
            <option value="{{ Helper::tra('country.finland.iso-3166-1') }}" {!! (Auth::user()->country_code == Helper::tra('country.finland.iso-3166-1')) ? "selected='true'" : "" !!}>{{ Helper::tra('country.finland.name') }}</option>
            <option value="{{ Helper::tra('country.sweden.iso-3166-1') }}" {!! (Auth::user()->country_code == Helper::tra('country.sweden.iso-3166-1')) ? "selected='true'" : "" !!}>{{ Helper::tra('country.sweden.name') }}</option>
        </select>

        @if ($errors->has('country_code'))
            <span class="help-block">
                <strong>{{ $errors->first('country_code') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">{{ Helper::tra('form.button.update') }}</button>
    </div>
</form>
@endsection
