@extends('layouts.auth')

@section('base.title', Helper::tra('auth.reset.title'))

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1>{{ Helper::tra('auth.reset.title') }}</h1>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">{{ Helper::tra('auth.reset.email') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        {{ Helper::tra('form.button.send-password-reset') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
