@extends('layouts.base')

@section('base.title', __('auth.login.title'))

@section('base.content')
<div class="container h-100">
    <div class="row py-5 justify-content-center align-items-center">
        <div class="col-md-6">
            <h1>{{ __('auth.login.title') }}</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">{{ __('auth.login.email') }}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">{{ __('auth.login.password') }}</label>
                    <input id="password" type="password" class="form-control" name="password" autocomplete="current-password" required>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="rememberMe"{{ old('remember') ? ' checked' : '' }}>
                        <label class="form-check-label" for="rememberMe">
                            {{ __('auth.login.remember-me') }}
                        </label>
                    </div>
                </div>

                <div class="form-group align-items-center d-flex">
                    <a href="{{ route('password.request') }}" class="d-inline-block">
                        {{ __('auth.login.forgot-password') }}
                    </a>
                    <input type="submit" class="btn px-4 ml-auto btn-primary" value="{{ __('auth.login.login') }}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
