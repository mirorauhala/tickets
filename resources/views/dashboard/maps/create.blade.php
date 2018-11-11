@extends('layouts.base')

@section('base.title', 'Featured')

@section('base.content')
<div class="container">
    <div class="row pb-5">
        <div class="col-md-12">
            <p class="lead mb-0">{{ $event->name }}</p>
            <h1 class="mt-0 text-uppercase">Maps / Create</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('dashboard._menu')
        </div>

        <div class="col-md-9">
            <form method="post" action="{{ route('dashboard.maps.create', $event) }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
                    <label for="name">Map name</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name">

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary px-4">{{ tra('form.button.create') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
