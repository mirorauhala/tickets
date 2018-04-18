@extends('layouts.base')

@section('settings.title', tra('settings.panel.title.profile'))

@section('base.content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row justify-content-center align-items-center h-25">
            <div class="col-md-10">
                <h1>Settings</h1>
                <p class="lead">Change your profile.</h1>
            </div>
            <div class="col-md-10">
                @include('settings._menu')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form method="post" action="{{ route('settings') }}">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_name">{{ tra('settings.profile.first-name') }}</label>
                            <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" id="first_name" name="first_name" placeholder="Your first name" value="{{ Auth::user()->first_name }}">

                            @if ($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">{{ tra('settings.profile.last-name') }}</label>
                            <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" id="last_name" name="last_name" placeholder="Your last name" value="{{ Auth::user()->last_name }}">

                            @if ($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ tra('settings.profile.email') }}</label>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Your email address" value="{{ Auth::user()->email }}">

                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="phone">{{ tra('auth.register.phone') }}</label>
                        <input id="phone" type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ Auth::user()->phone }}">

                        @if ($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary px-4" value="{{ tra('form.button.update') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
