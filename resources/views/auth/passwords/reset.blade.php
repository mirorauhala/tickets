@extends('layouts.base')

@section('base.title', __('auth.reset.title'))

@section('base.content')
<div class="container">
    <div class="row py-5 justify-content-center align-items-center">
        <div class="col-md-6">
            <h1>{{ __('auth.reset.title') }}</h1>
            <p class="lead">{{ __('auth.reset.title-alternative') }}</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form role="form" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
                    <label for="email">{{ __('auth.reset.email') }}</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" autocomplete="email" required autofocus>

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">{{ __('auth.reset.new-password') }}</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autocomplete="new-password" required>

                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('auth.reset.new-password-confirmation') }}</label>
                    <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" autocomplete="new-password" required>

                    @if ($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary px-4" value="{{ __('auth.reset.send-link') }}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
