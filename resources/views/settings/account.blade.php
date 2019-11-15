@extends('layouts.base')

@section('base.title', tra('settings.title'))

@section('base.content')
<div class="tw-container tw-mx-auto">
    <div class="row pb-5 pt-4">
        <div class="col-md-12">
            <h1>{{ tra('settings.title') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('settings._menu')
        </div>
        <div class="col-md-8 offset-md-1">
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
                                <label for="first_name">First name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ auth()->user()->first_name }}" />

                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group col-6 col-md-6">
                                <label for="last_name">Last name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ auth()->user()->last_name }}" />

                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" />

                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ auth()->user()->phone }}" />

                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <app-button type="submit" variant="primary">
                                Update
                            </app-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
