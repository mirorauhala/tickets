@extends('layouts.base')

@section('base.title', tra('tickets.title'))

@section('base.content')
<div class="container h-100">
    <div class="row h-25 my-3 justify-content-center align-items-center">
        <div class="col-md-12">
            <h1>{{ tra('tickets.title') }}</h1>
            <p class="lead">{{ tra('tickets.lead-redeem') }}</h1>

            @include('tickets._menu')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('tickets.redeem') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="redeemCode">Redeem code</label>
                   <input type="text" class="form-control" name="redeem_code" id="redeemCode" required>
                </div>
                <input type="submit" class="btn btn-primary px-3" value="{{ tra('form.button.submit') }}">
            </form>
        </div>
    </div>
</div>
@endsection
