@extends('layouts.event-admin')

@section('admin.content')
    <h1 id="adminTitle">{{ tra('event.admin.pages.tickets.new.title') }}</h1>

    <form method="post" action="{{ route('events.admin.tickets.new') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('ticket_name') ? ' has-error' : '' }}">
            <label for="ticket_name" class="control-label">{{ tra('event.admin.pages.tickets.new.form.ticket-name') }}</label>

            <input type="text" class="form-control" id="ticket_name" name="ticket_name">

            @if ($errors->has('ticket_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('ticket_name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('ticket_price') ? ' has-error' : '' }}">
            <label for="ticket_price" class="control-label">{{ tra('event.admin.pages.tickets.new.form.ticket-price') }}</label>
            <input type="number" class="form-control" id="ticket_price" name="ticket_price">

            @if ($errors->has('ticket_price'))
                <span class="help-block">
                    <strong>{{ $errors->first('ticket_price') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('ticket_vat') ? ' has-error' : '' }}">
            <label for="ticket_vat" class="control-label">{{ tra('event.admin.pages.tickets.new.form.ticket-vat') }}</label>
            <input type="number" class="form-control" id="ticket_vat" name="ticket_vat">

            @if ($errors->has('ticket_vat'))
                <span class="help-block">
                    <strong>{{ $errors->first('ticket_vat') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('ticket_reserved') ? ' has-error' : '' }}">
            <label for="ticket_reserved" class="control-label">{{ tra('event.admin.pages.tickets.new.form.ticket-reserved') }}</label>
            <input type="number" class="form-control" id="ticket_reserved" name="ticket_reserved">

            @if ($errors->has('ticket_reserved'))
                <span class="help-block">
                    <strong>{{ $errors->first('ticket_reserved') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('ticket_max') ? ' has-error' : '' }}">
            <label for="ticket_max" class="control-label">{{ tra('event.admin.pages.tickets.new.form.ticket-max') }}</label>
            <input type="number" class="form-control" id="ticket_max" name="ticket_max">

            @if ($errors->has('ticket_max'))
                <span class="help-block">
                    <strong>{{ $errors->first('ticket_max') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('ticket_seatable') ? ' has-error' : '' }}">
            <label for="ticket_seatable" class="control-label">{{ tra('event.admin.pages.tickets.new.form.ticket-seatable') }}</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="ticket_seatable" id="ticket_seatable" value="0">
                    {{ tra('event.admin.pages.tickets.new.form.ticket-seatable-checkbox-label') }}
                </label>
            </div>

            @if ($errors->has('ticket_seatable'))
                <span class="help-block">
                    <strong>{{ $errors->first('ticket_seatable') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('ticket_availableAt') ? ' has-error' : '' }}">
            <label for="ticket_availableAt" class="control-label">{{ tra('event.admin.pages.tickets.new.form.ticket-availableAt') }}</label>
            <input type="text" class="form-control" id="ticket_availableAt" name="ticket_availableAt">

            @if ($errors->has('ticket_availableAt'))
                <span class="help-block">
                    <strong>{{ $errors->first('ticket_availableAt') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('ticket_unavailableAt') ? ' has-error' : '' }}">
            <label for="ticket_unavailableAt" class="control-label">{{ tra('event.admin.pages.tickets.new.form.ticket-unavailableAt') }}</label>
            <input type="text" class="form-control" id="ticket_aunvailableAt" name="ticket_unavailableAt">

            @if ($errors->has('ticket_unavailableAt'))
                <span class="help-block">
                    <strong>{{ $errors->first('ticket_unavailableAt') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ tra('form.button.create') }}</button>
        </div>
    </form>



    <p class="text-muted" title="Sanity check">Server time: {{ Carbon\Carbon::now() }}</p>


@endsection
