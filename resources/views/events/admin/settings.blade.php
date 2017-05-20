@extends('layouts.event-admin')

@section('admin.content')
    <h1 id="adminTitle">{{ __('event.admin.pages.settings.title') }}</h1>


    <form method="post" action="{{ route('events.admin.settings') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('event_name') ? ' has-error' : '' }}">
            <label for="inputEventName" class="control-label">{{ __('event.admin.pages.settings.form.event-name') }}</label>

            <input type="text" class="form-control" id="inputEventName" name="event_name" placeholder="{{ __('event.admin.pages.settings.form.event-name-placeholder') }}" value="{{ $event->name }}">

            @if ($errors->has('event_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('event_name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('event_location') ? ' has-error' : '' }}">
            <label for="inputEventLocation" class="control-label">{{ __('event.admin.pages.settings.form.event-location') }}</label>
            <input type="text" class="form-control" id="inputEventLocation" name="event_location" placeholder="{{ __('event.admin.pages.settings.form.event-location-placeholder') }}" value="{{ $event->location }}">

            @if ($errors->has('event_location'))
                <span class="help-block">
                    <strong>{{ $errors->first('event_location') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('event_url') ? ' has-error' : '' }}">
            <label for="inputEventUrl" class="control-label">{{ __('event.admin.pages.settings.form.event-url') }}</label>
            <input type="url" class="form-control" id="inputEventUrl" name="event_url" placeholder="{{ __('event.admin.pages.settings.form.event-url-placeholder') }}" value="{{ $event->url }}">

            @if ($errors->has('event_url'))
                <span class="help-block">
                    <strong>{{ $errors->first('event_url') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('event_currency') ? ' has-error' : '' }}">
            <label for="inputEventCurrency" class="control-label">{{ __('event.admin.pages.settings.form.event-currency') }}</label>
            <input type="text" class="form-control" id="inputEventCurrency" name="event_currency" placeholder="{{ __('event.admin.pages.settings.form.event-currency-placeholder') }}" value="{{ $event->currency }}" disabled>

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

            <label for="inputEventAvailabilityRadio1" class="control-label">{{ __('event.admin.pages.settings.form.event-visibility') }}</label>
            <div class="radio">
                <label>
                    <input type="radio" name="inputEventAvailabilityRadio" id="inputEventAvailabilityRadio1" value="0" {{ ($event->is_visible == 0) ? "" : "checked"  }}>
                    {{ __('event.admin.pages.settings.form.event-visibility-offline') }}
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="inputEventAvailabilityRadio" id="inputEventAvailabilityRadio2" value="1" {{ ($event->is_visible == 1) ? "checked" : ""  }}>
                    {{ __('event.admin.pages.settings.form.event-visibility-online') }}
                </label>
            </div>

            @if ($errors->has('event_visibility'))
                <span class="help-block">
                    <strong>{{ $errors->first('event_visibility') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('form.button.update') }}</button>
        </div>
    </form>

@endsection
