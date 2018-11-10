@extends('layouts.base')

@section('base.title', 'Featured')

@section('base.content')
<div class="container h-100">
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
            <form method="post" action="{{ route('dashboard.tickets.view', [$event, $ticket]) }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('ticket_name') ? ' is-invalid' : '' }}">
                    <label for="ticket_name">Ticket name</label>
                    <input type="text" class="form-control{{ $errors->has('ticket_name') ? ' is-invalid' : '' }}" id="ticket_name" name="ticket_name" value="{{ $ticket->name }}">

                    @if ($errors->has('ticket_name'))
                        <span class="invalid-feedback">
                            {{ $errors->first('ticket_name') }}
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('price') ? ' is-invalid' : '' }}">
                    <label for="price">Price <sup>(in cents, 1,00 &euro; = 1000)</sup></label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $ticket->price }}">

                    @if ($errors->has('price'))
                        <span class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('vat') ? ' is-invalid' : '' }}">
                    <label for="vat">Value after tax percentage</label>
                    <input type="number" class="form-control" id="vat" name="vat" value="{{ $ticket->vat }}">

                    @if ($errors->has('vat'))
                        <span class="invalid-feedback">
                            {{ $errors->first('vat') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('reserved') ? ' is-invalid' : '' }}">
                    <label for="reserved">Reserved tickets</label>
                    <input type="text" class="form-control" id="reserved" name="reserved" value="{{ $ticket->reserved }}">
                    <small class="form-text text-muted">
                        Maximum amount of tickets that can be sold.
                    </small>

                    @if ($errors->has('reserved'))
                        <span class="invalid-feedback">
                            {{ $errors->first('reserved') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('maxAmountPerTransaction') ? ' is-invalid' : '' }}">
                    <label for="maxAmountPerTransaction">Max ticket amount per transaction</label>
                    <input type="text" class="form-control" id="maxAmountPerTransaction" name="maxAmountPerTransaction" value="{{ $ticket->maxAmountPerTransaction }}">

                    <small class="form-text text-muted">
                        How many tickets can be bought simultaneously.
                    </small>

                    @if ($errors->has('maxAmountPerTransaction'))
                        <span class="invalid-feedback">
                            {{ $errors->first('maxAmountPerTransaction') }}
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('availableAt') ? ' is-invalid' : '' }}">
                    <label for="availableAt">Sales start date</label>
                    <input type="text" class="form-control" id="availableAt" name="availableAt" value="{{ $ticket->availableAt }}">

                    @if ($errors->has('availableAt'))
                        <span class="invalid-feedback">
                            {{ $errors->first('availableAt') }}
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('unavailableAt') ? ' is-invalid' : '' }}">
                    <label for="unavailableAt">Sales end date</label>
                    <input type="text" class="form-control" id="unavailableAt" name="unavailableAt" value="{{ $ticket->unavailableAt }}">

                    @if ($errors->has('unavailableAt'))
                        <span class="invalid-feedback">
                            {{ $errors->first('unavailableAt') }}
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
