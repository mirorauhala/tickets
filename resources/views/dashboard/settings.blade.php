@extends('layouts.base')

@section('base.title', 'Featured')

@section('base.content')
<div class="container">
    <div class="row pb-5">
        <div class="col-md-12">
            <p class="lead mb-0">{{ $event->name }}</p>
            <h1 class="mt-0 text-uppercase">{{ tra('dashboard.nav.settings') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('dashboard._menu')
        </div>

        <div class="col-md-9">
            <form method="post" action="{{ route('dashboard.settings', $event) }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
                    <label for="name">{{ tra('event.admin.pages.settings.form.event-name') }}</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="{{ tra('event.admin.pages.settings.form.event-name-placeholder') }}" value="{{ $event->name }}">

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('slug') ? ' is-invalid' : '' }}">
                    <label for="slug">{{ tra('event.admin.pages.settings.form.event-url') }}</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $event->slug }}">

                    @if ($errors->has('slug'))
                        <span class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('location') ? ' is-invalid' : '' }}">
                    <label for="location">{{ tra('event.admin.pages.settings.form.event-location') }}</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="{{ tra('event.admin.pages.settings.form.event-location-placeholder') }}" value="{{ $event->location }}">

                    @if ($errors->has('location'))
                        <span class="invalid-feedback">
                            {{ $errors->first('location') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('url') ? ' is-invalid' : '' }}">
                    <label for="url">{{ tra('event.admin.pages.settings.form.event-url') }}</label>
                    <input type="url" class="form-control" id="url" name="url" placeholder="{{ tra('event.admin.pages.settings.form.event-url-placeholder') }}" value="{{ $event->url }}">

                    @if ($errors->has('url'))
                        <span class="invalid-feedback">
                            {{ $errors->first('url') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('currency') ? ' is-invalid' : '' }}">
                    <label for="currency">{{ tra('event.admin.pages.settings.form.event-currency') }}</label>
                    <input type="text" class="form-control" id="currency" name="currency" value="EUR" placeholder="{{ tra('event.admin.pages.settings.form.event-currency-placeholder') }}" value="{{ $event->currency }}" disabled>

                    <span class="invalid-feedback">
                        Not editable at this moment.
                    </span>

                    @if ($errors->has('currency'))
                        <span class="invalid-feedback">
                            {{ $errors->first('currency') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('event_visibility') ? ' is-invalid' : '' }}">

                    <label for="event_visibility1">{{ tra('event.admin.pages.settings.form.event-visibility') }}</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="event_visibility" id="event_visibility1" value="0" {{ ($event->is_visible == 0) ? "checked" : ""  }}>
                            {{ tra('event.admin.pages.settings.form.event-visibility-offline') }}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="event_visibility" id="event_visibility2" value="1" {{ ($event->is_visible == 1) ? "checked" : ""  }}>
                            {{ tra('event.admin.pages.settings.form.event-visibility-online') }}
                        </label>
                    </div>

                    @if ($errors->has('event_visibility'))
                        <span class="invalid-feedback">
                            {{ $errors->first('event_visibility') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary px-4">{{ tra('form.button.update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
