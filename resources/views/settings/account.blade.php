@extends('layouts.base')

@section('base.title', __('settings.title'))

@section('base.content')
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-5xl font-bold mb-3">{{ __('settings.title') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-3 mb-3">
            @include('settings._menu')
        </div>
        <div class="col-12 col-md-8 md-offset-1">
            @include('partials.messages.flashbox')
            <div class="card">
                <div class="card-header">
                    Account
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('settings') }}">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-6 col-md-6">
                                <label for="first_name">{{ __('settings.account.first_name') }}</label>
                                <input
                                    type="text"
                                    class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                    id="first_name"
                                    name="first_name"
                                    autocomplete="given-name"
                                    value="{{ old('first_name', Auth::user()->first_name) }}"
                                    required
                                >

                                @if ($errors->has('first_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('first_name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-6 col-md-6">
                                <label for="email">{{ __('settings.account.last_name') }}</label>
                                <input
                                    type="text"
                                    class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                    id="last_name"
                                    name="last_name"
                                    autocomplete="given-name"
                                    value="{{ old('last_name', Auth::user()->last_name) }}"
                                    required
                                >

                                @if ($errors->has('last_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('last_name') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('settings.account.email') }}</label>
                            <input
                                type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                id="email"
                                name="email"
                                autocomplete="email"
                                value="{{ old('email', Auth::user()->email) }}"
                                required
                            >

                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('settings.account.phone') }}</label>
                            <input
                                type="text"
                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                id="phone"
                                name="phone"
                                value="{{ old('phone', Auth::user()->phone) }}"
                                autocomplete="tel"
                            >

                            @if ($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary px-4" value="{{ __('form.button.update') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
