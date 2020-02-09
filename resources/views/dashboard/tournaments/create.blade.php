@extends('layouts.base')

@section('base.title', tra('dashboard.nav.tournaments-create'))

@section('base.content')
<div class="container">
    <div class="row pb-5">
        <div class="col-md-12">
            <p class="lead mb-0">{{ $event->name }}</p>
            <h1 class="mt-0 text-uppercase">{{ tra('dashboard.nav.tournaments-create') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('dashboard._menu')
        </div>

        <div class="col-md-9">
            <form method="post" action="{{ route('dashboard.tournaments.store', $event) }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
                    <label for="name">Name</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name">

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                    <label for="description">Description</label>
                    <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" name="description">

                    @if ($errors->has('description'))
                        <span class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('rules') ? ' is-invalid' : '' }}">
                    <label for="rules">Rules</label>
                    <input type="text" class="form-control{{ $errors->has('rules') ? ' is-invalid' : '' }}" id="rules" name="rules">

                    @if ($errors->has('rules'))
                        <span class="invalid-feedback">
                            {{ $errors->first('rules') }}
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('registration_start') ? ' is-invalid' : '' }}">
                    <label for="registration_start">registration_start</label>
                    <input type="text" class="form-control{{ $errors->has('registration_start') ? ' is-invalid' : '' }}" id="registration_start" name="registration_start">

                    @if ($errors->has('registration_start'))
                        <span class="invalid-feedback">
                            {{ $errors->first('registration_start') }}
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('registration_end') ? ' is-invalid' : '' }}">
                    <label for="registration_end">registration_end</label>
                    <input type="text" class="form-control{{ $errors->has('registration_end') ? ' is-invalid' : '' }}" id="registration_end" name="registration_end">

                    @if ($errors->has('registration_end'))
                        <span class="invalid-feedback">
                            {{ $errors->first('registration_end') }}
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('max_teams') ? ' is-invalid' : '' }}">
                    <label for="max_teams">max_teams</label>
                    <input type="text" class="form-control{{ $errors->has('max_teams') ? ' is-invalid' : '' }}" id="max_teams" name="max_teams">

                    @if ($errors->has('max_teams'))
                        <span class="invalid-feedback">
                            {{ $errors->first('max_teams') }}
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('team_min_size') ? ' is-invalid' : '' }}">
                    <label for="team_min_size">team_min_size</label>
                    <input type="text" class="form-control{{ $errors->has('team_min_size') ? ' is-invalid' : '' }}" id="team_min_size" name="team_min_size">

                    @if ($errors->has('team_min_size'))
                        <span class="invalid-feedback">
                            {{ $errors->first('team_min_size') }}
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('team_max_size') ? ' is-invalid' : '' }}">
                    <label for="team_max_size">team_max_size</label>
                    <input type="text" class="form-control{{ $errors->has('team_max_size') ? ' is-invalid' : '' }}" id="team_max_size" name="team_max_size">

                    @if ($errors->has('team_max_size'))
                        <span class="invalid-feedback">
                            {{ $errors->first('team_max_size') }}
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
