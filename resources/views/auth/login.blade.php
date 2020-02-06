@extends('layouts.base')

@section('base.title', tra('auth.login.title'))

@section('base.content')
<div class="container mx-auto pt-10">
    <div class="w-6/12">
        <h1 class="text-6xl font-bold mb-3">{{ tra('auth.login.title') }}</h1>
    </div>
    <div class="w-4/12">
        <form role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="mb-2">

                <label for="password" class="font-bold">{{ tra('auth.login.password') }}</label>
                <form-input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    autocomplete="email"
                    :error="{{ $errors->has('email') ? 'true' : 'false' }}"
                    required
                    autofocus
                    ></form-input>

                @if($errors->has('email'))
                    <p class="" role="">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="password" class="font-bold">{{ tra('auth.login.password') }}</label>
                <form-input id="password" type="password" class="block px-3 py-2 border rounded" name="password" autocomplete="current-password" required>
            </div>

            <div class="mb-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="rememberMe"{{ old('remember') ? ' checked' : '' }}>
                    <label class="form-check-label" for="rememberMe">
                        {{ tra('auth.login.remember-me') }}
                    </label>
                </div>
            </div>

            <div class="mb-2 align-items-center d-flex">
                <a href="{{ route('password.request') }}" class="d-inline-block">
                    {{ tra('auth.login.forgot-password') }}
                </a>
                <app-button type="submit" theme="primary">{{ tra('auth.login.login') }}</app-button>
            </div>
        </form>
    </div>
</div>
@endsection
