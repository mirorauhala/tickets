@extends('layouts.base')

@section('base.title', 'Featured')

@section('base.content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row align-items-center h-25">
            <div class="col-md-12">
                <h1>Dashboard for {{ $event->name }}</h1>
                <p class="lead">All tickets for this event.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                @include('dashboard._menu')
            </div>

            <div class="col-md-9">
                <form method="post" action="{{ route('dashboard.maps.update', [$event, $map]) }}">
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
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary px-4">{{ tra('form.button.update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
