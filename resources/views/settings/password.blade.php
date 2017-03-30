@extends('layouts.base')

@section('base.content')
<div class="row">
    <div class="col-md-3">
        @include("partials.nav.settings")
    </div>

    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">{{ __('settings.panel.title.change-password') }}</div>

            <div class="panel-body">
                <form class="form-horizontal" method="post" action="{{ route('settings.password') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                        <label for="inputCurrentPassword" class="col-sm-3 control-label">{{ __('settings.change-password.current') }}</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputCurrentPassword" name="current_password" placeholder="Your current password">

                            @if ($errors->has('current_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                        <label for="inputNewPassword" class="col-sm-3 control-label">{{ __('settings.change-password.new') }}</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputNewPassword" name="new_password" placeholder="Your new password (min. 6 characters)">

                            @if ($errors->has('new_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                        <label for="inputNewPasswordConfirmation" class="col-sm-3 control-label">{{ __('settings.change-password.confirmation') }}</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputNewPasswordConfirmation" name="new_password_confirmation" placeholder="Verify your new password">

                            @if ($errors->has('new_password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-default">{{ __('form.button.change') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
