@extends('layouts.event-admin')

@section('admin.content')
    <h1 id="adminTitle">{{ tra('event.admin.pages.settings.title') }}</h1>


    <form method="post" action="{{ route('events.admin.settings') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('event_name') ? ' has-error' : '' }}">
            <label for="event_name" class="control-label">{{ tra('event.admin.pages.settings.form.event-name') }}</label>

            <input type="text" class="form-control" id="event_name" name="event_name" placeholder="{{ tra('event.admin.pages.settings.form.event-name-placeholder') }}" value="{{ $event->name }}">

            @if ($errors->has('event_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('event_name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('event_location') ? ' has-error' : '' }}">
            <label for="event_location" class="control-label">{{ tra('event.admin.pages.settings.form.event-location') }}</label>
            <input type="text" class="form-control" id="event_location" name="event_location" placeholder="{{ tra('event.admin.pages.settings.form.event-location-placeholder') }}" value="{{ $event->location }}">

            @if ($errors->has('event_location'))
                <span class="help-block">
                    <strong>{{ $errors->first('event_location') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('event_url') ? ' has-error' : '' }}">
            <label for="event_url" class="control-label">{{ tra('event.admin.pages.settings.form.event-url') }}</label>
            <input type="url" class="form-control" id="event_url" name="event_url" placeholder="{{ tra('event.admin.pages.settings.form.event-url-placeholder') }}" value="{{ $event->url }}">

            @if ($errors->has('event_url'))
                <span class="help-block">
                    <strong>{{ $errors->first('event_url') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('event_currency') ? ' has-error' : '' }}">
            <label for="event_currency" class="control-label">{{ tra('event.admin.pages.settings.form.event-currency') }}</label>
            <input type="text" class="form-control" id="event_currency" name="event_currency" placeholder="{{ tra('event.admin.pages.settings.form.event-currency-placeholder') }}" value="{{ $event->currency }}" disabled>

            <span class="help-block">
                <strong>Not editable at this moment.</strong>
            </span>

            @if ($errors->has('event_currency'))
                <span class="help-block">
                    <strong>{{ $errors->first('event_currency') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('event_visibility') ? ' has-error' : '' }}">

            <label for="event_visibility1" class="control-label">{{ tra('event.admin.pages.settings.form.event-visibility') }}</label>
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
                <span class="help-block">
                    <strong>{{ $errors->first('event_visibility') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ tra('form.button.update') }}</button>
        </div>
    </form>

@endsection
