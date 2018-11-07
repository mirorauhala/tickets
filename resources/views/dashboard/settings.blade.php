@extends('layouts.base')

@section('base.title', 'Featured')

@section('base.content')
<div class="container h-100">
    <div class="row align-items-center h-25">
        <div class="col-md-12">
            <h1>Dashboard for {{ $event->name }}</h1>
            <p class="lead">Manage event settings.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('dashboard._menu')
        </div>

        <div class="col-md-9">
            <form method="post" action="{{ route('dashboard.settings', $event) }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('event_name') ? ' is-invalid' : '' }}">
                    <label for="event_name">{{ tra('event.admin.pages.settings.form.event-name') }}</label>
                    <input type="text" class="form-control{{ $errors->has('event_name') ? ' is-invalid' : '' }}" id="event_name" name="event_name" placeholder="{{ tra('event.admin.pages.settings.form.event-name-placeholder') }}" value="{{ $event->name }}">

                    @if ($errors->has('event_name'))
                        <span class="invalid-feedback">
                            {{ $errors->first('event_name') }}
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('slug') ? ' is-invalid' : '' }}">
                    <label for="slug">{{ tra('event.admin.pages.settings.form.event-url') }}</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $event->url }}">

                    @if ($errors->has('slug'))
                        <span class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('event_location') ? ' is-invalid' : '' }}">
                    <label for="event_location">{{ tra('event.admin.pages.settings.form.event-location') }}</label>
                    <input type="text" class="form-control" id="event_location" name="event_location" placeholder="{{ tra('event.admin.pages.settings.form.event-location-placeholder') }}" value="{{ $event->location }}">

                    @if ($errors->has('event_location'))
                        <span class="invalid-feedback">
                            {{ $errors->first('event_location') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('event_url') ? ' is-invalid' : '' }}">
                    <label for="event_url">{{ tra('event.admin.pages.settings.form.event-url') }}</label>
                    <input type="url" class="form-control" id="event_url" name="event_url" placeholder="{{ tra('event.admin.pages.settings.form.event-url-placeholder') }}" value="{{ $event->url }}">

                    @if ($errors->has('event_url'))
                        <span class="invalid-feedback">
                            {{ $errors->first('event_url') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('event_currency') ? ' is-invalid' : '' }}">
                    <label for="event_currency">{{ tra('event.admin.pages.settings.form.event-currency') }}</label>
                    <input type="text" class="form-control" id="event_currency" name="event_currency" placeholder="{{ tra('event.admin.pages.settings.form.event-currency-placeholder') }}" value="{{ $event->currency }}" disabled>

                    <span class="invalid-feedback">
                        Not editable at this moment.
                    </span>

                    @if ($errors->has('event_currency'))
                        <span class="invalid-feedback">
                            {{ $errors->first('event_currency') }}
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
