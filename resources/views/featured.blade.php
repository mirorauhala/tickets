@extends('layouts.base')

@section('base.title', 'Featured')

@section('base.content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row align-items-center h-25">
            <div class="col-md-12">
                <h1>Get started at booking tickets!</h1>
                <p class="lead">Start by choosing an event.</h1>
            </div>
        </div>
        <div class="row">
            @if(count($events) > 0)
                @foreach($events as $event)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $event->location }}</h6>
                            <p class="card-text">{{ $event->slogan }}</p>
                            <a href="{{ route('event', ['event' => $event]) }}" class="card-link">View pricing</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="lead">Sorry, no events to show as of now.</p>
            @endif
        </div>
    </div>
</div>
@endsection
