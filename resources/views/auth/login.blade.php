@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">{{ Helper::tra('auth.login.title') }}</h1>
        <br>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">{{ __('auth.login.email') }}</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">{{ Helper::tra('auth.login.password') }}</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ Helper::tra('auth.login.remember-me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        {{ Helper::tra('form.button.login') }}
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ Helper::tra('form.button.forgot-password') }}
                    </a>
                </div>
            </div>
        </form>

        <hr>

        <a class="btn btn-link" href="{{ route('register') }}">
            {{ Helper::tra('auth.login.no-account') }}
        </a>
    </div>
</div>
@endsection
