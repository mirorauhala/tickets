@extends('layouts.base')

@section('base.title', tra('auth.register.title'))

@section('base.content')
<div class="container mx-auto">
    <div class="row py-5 justify-content-center align-items-center">
        <div class="col-md-6">
            <h1>{{ tra('auth.register.title') }}</h1>
            <p class="lead">{{ tra('auth.register.lead') }}</p>
        </div>
    </div>
    <div class="row pb-5 justify-content-center">
        <div class="col-md-6">
            <form role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-6 col-md-6">
                        <label for="first_name">{{ tra('auth.register.first-name') }}</label>
                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" autocomplete="given-name" required autofocus>

                        @if ($errors->has('first_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('first_name') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-6 col-md-6">
                        <label for="last_name">{{ tra('auth.register.last-name') }}</label>
                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" autocomplete="family-name" required autofocus>

                        @if ($errors->has('last_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_name') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">{{ tra('auth.register.email') }}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autocomplete="email" required>

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">{{ tra('auth.register.password') }}</label>
                        <input id="password" type="password"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" aria-describedby="passwordHelpBlock" autocomplete="new-password" required>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            {{ tra('auth.register.password-help') }}
                        </small>

                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password_confirmation">{{ tra('auth.register.confirm-password') }}</label>
                        <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" autocomplete="new-password" required>

                        @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone">{{ tra('auth.register.phone') }}</label>
                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" aria-describedby="phoneHelpBlock" value="{{ old('phone') }}" autocomplete="tel">
                    <small id="phoneHelpBlock" class="form-text text-muted">
                        {{ tra('auth.register.phone-help') }}
                    </small>

                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary px-4" value="{{ tra('auth.register.register') }}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
