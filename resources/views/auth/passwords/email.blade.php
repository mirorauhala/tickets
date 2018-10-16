@extends('layouts.base')

@section('base.title', tra('auth.reset.title'))

@section('base.content')
<div class="container h-100">
    <div class="row py-5 justify-content-center align-items-center">
        <div class="col-md-6">
            <h1>{{ tra('auth.reset.title') }}</h1>
            <p class="lead">{{ tra('auth.reset.lead') }}</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form role="form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">{{ tra('auth.reset.email') }}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autocomplete="email" required>

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group align-items-center d-flex">
                    <a href="{{ route('login') }}" class="d-inline-block">
                        {{ tra('auth.reset.didnt-forget-password') }}
                    </a>
                    <input type="submit" class="btn px-4 ml-auto btn-primary" value="{{ tra('auth.reset.send-link') }}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
