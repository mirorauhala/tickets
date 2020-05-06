@extends('layouts.base')

@section('base.title', __('dashboard.nav.maps'))

@section('base.content')
<div class="container">
    <div class="row pb-5">
        <div class="col-md-12">
            <p class="lead mb-0">{{ $event->name }}</p>
            <h1 class="mt-0 text-uppercase">{!! __('dashboard.nav.maps-edit', ['map' => $map->name]) !!}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('dashboard._menu')
        </div>

        <div class="col-md-9">
            @include('partials/messages/flashbox')
            <form method="post" action="{{ route('dashboard.maps.edit', [$event, $map]) }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
                    <label for="name">Map name</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ $map->name }}">

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>
                @if(false === $event->hasActiveMaps() || $map->active)
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="active" id="active"{{ $map->active ? ' checked' : '' }}>
                            <label class="form-check-label" for="active">
                                Set as currently active
                            </label>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-primary px-4">{{ __('form.button.update') }}</button>
                    <a href="#" class="btn btn-danger px-4"
                        onclick="event.preventDefault();
                        document.getElementById('destroy-form').submit();">{{ __('form.button.delete') }}</a>
                </div>
            </form>
            <form id="destroy-form" action="{{ route('dashboard.maps.destroy', ['event' => $event, 'map' => $map]) }}" method="POST" style="display: none;">
                @method('DELETE')
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
@endsection
