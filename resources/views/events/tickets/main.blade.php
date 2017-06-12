@extends('layouts.event')

@section('content')

<h1>{{ Helper::tra('event.pages.tickets.title') }}</h1>

<br>
<div class="row">
    <div class="col-md-5">
        <a class="thumbnail clearfix" href="{{ route('events.tickets.visitor') }}">
            <div class="col-md-12">
                <h2>Kävijälippu</h2>
            </div>
        </a>
    </div>
    <div class="col-md-5">
        <a class="thumbnail clearfix" href="{{ route('events.tickets.gamer') }}">
            <div class="col-md-12">
                <h2>Pelaajalippu</h2>
            </div>
        </a>
    </div>
</div>
@endsection
