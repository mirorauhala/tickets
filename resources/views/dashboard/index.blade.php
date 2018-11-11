@extends('layouts.base')

@section('base.title', 'Featured')

@section('base.content')
<div class="container">
    <div class="row pb-5">
        <div class="col-md-10">
            <h1>Pick an event to manage</h1>
            <p class="lead">Start by choosing an event.</p>
        </div>
    </div>
    <div class="row justify-content-center">
        @if(count($events) > 0)
            @foreach($events as $event)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $event->location }}</h6>
                        <a href="{{ route('dashboard.show', ['event' => $event]) }}" class="card-link">Manage</a>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <p class="lead">Sorry, no events to show as of now.</p>
        @endif
    </div>
</div>
@endsection
