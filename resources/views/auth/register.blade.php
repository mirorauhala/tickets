@extends('layouts.auth')

@section('base.title', tra('auth.register.title'))

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">{{ tra('auth.register.title') }}</h1>
        <br>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="first_name" class="control-label">{{ tra('auth.register.first-name') }}</label>

                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name" class="control-label">{{ tra('auth.register.last-name') }}</label>

                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">{{ tra('auth.register.email') }}</label>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('street_address') ? ' has-error' : '' }}">
                <label for="street_address" class="control-label">{{ tra('auth.register.street_address') }}</label>

                <input id="street_address" type="text" class="form-control" name="street_address" value="{{ old('street_address') }}" required>

                @if ($errors->has('street_address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('street_address') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                <label for="postal_code" class="control-label">{{ tra('auth.register.postal_code') }}</label>

                <input id="postal_code" type="text" class="form-control" name="postal_code" value="{{ old('postal_code') }}" required>

                @if ($errors->has('postal_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('postal_code') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('postal_office') ? ' has-error' : '' }}">
                <label for="postal_office" class="control-label">{{ tra('auth.register.postal_office') }}</label>

                <input id="postal_office" type="text" class="form-control" name="postal_office" value="{{ old('postal_office') }}" required>

                @if ($errors->has('postal_office'))
                    <span class="help-block">
                        <strong>{{ $errors->first('postal_office') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('country_code') ? ' has-error' : '' }}">
                <label for="country_code" class="control-label">{{ tra('auth.register.country_code') }}</label>

                <select class="form-control" name="country_code" id="country_code" required>
                    <option value="{{ tra('country.finland.iso-3166-1') }}">{{ tra('country.finland.name') }}</option>
                    <option value="{{ tra('country.sweden.iso-3166-1') }}">{{ tra('country.sweden.name') }}</option>
                </select>

                @if ($errors->has('country_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('country_code') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">{{ tra('auth.register.password') }}</label>

                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="control-label">{{ tra('auth.register.confirm-password') }}</label>

                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        {{ tra('form.button.register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
