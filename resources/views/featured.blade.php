@extends('layouts.base')

@section('base.title', tra('featured.title'))

@section('base.content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row justify-content-center align-items-center h-25">
            <div class="col-md-10">
                <h1>{{ tra('featured.title') }}</h1>
                <p class="lead">{{ tra('featured.lead') }}</h1>
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
                            <p class="card-text">{{ $event->slogan }}</p>
                            <a href="{{ route('event', ['event' => $event]) }}" class="card-link">{{ tra('featured.card-cta') }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="lead">{{ tra('featured.no-events') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection
