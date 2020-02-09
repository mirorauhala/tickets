@extends('layouts.base')

@section('base.title', tra('settings.title'))

@section('base.content')
<div class="container">
    <div class="w-full">
        <h1 class="text-5xl font-bold mb-3">{{ tra('settings.title') }}</h1>
    </div>
    <div class="flex">
        <div class="w-3/12">
            @include('settings._menu')
        </div>
        <div class="w-9/12">
            @include('partials.messages.flashbox')
            <form method="post" action="{{ route('settings.password') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="current_password">{{ tra('settings.change-password.current') }}</label>
                    <input type="password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" id="current_password" name="current_password" autocomplete="current-password" required>

                    @if ($errors->has('current_password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('current_password') }}
                        </div>
                    @endif
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="new_password">{{ tra('settings.change-password.new') }}</label>
                        <input type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" id="new_password" name="new_password" aria-describedby="passwordHelpBlock" autocomplete="new-password" required>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            {{ tra('auth.register.password-help') }}
                        </small>

                        @if ($errors->has('new_password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('new_password') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="new_password_confirmation">{{ tra('settings.change-password.confirmation') }}</label>
                        <input type="password" class="form-control{{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }}" id="new_password_confirmation" name="new_password_confirmation" autocomplete="new-password" required>

                        @if ($errors->has('new_password_confirmation'))
                            <div class="invalid-feedback">
                                {{ $errors->first('new_password_confirmation') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary px-4" value="{{ tra('form.button.change') }}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
