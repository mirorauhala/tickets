@extends('layouts.base')

@section('base.title', 'Featured')

@section('base.content')
<div class="container h-100">
    <div class="row align-items-center h-25">
        <div class="col-md-12">
            <p class="lead mb-0">{{ $event->name }}</p>
            <h1 class="mt-0 text-uppercase">Maps / Edit</h1>
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
                <div class="form-group">
                    <button type="submit" class="btn btn-primary px-4">{{ tra('form.button.update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
