@extends('layouts.base')

@section('base.title', tra('featured.title'))

@section('base.content')
<div class="tw-container tw-mx-auto">
    <div class="row pt-4">
        <div class="col-md-12">
            <h1>{{ tra('featured.title') }}</h1>
        </div>
        <div class="col-md-12">
            @include('events._menu')
        </div>
    </div>
    <div class="row">
        @if(count($events) > 0)
            @foreach($events as $event)
            <div class="col-md-6 col-lg-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $event->location }}</h6>
                        <p class="card-text">{{ $event->slogan }}</p>
                        <a href="{{ route('events.show', ['event' => $event]) }}" class="card-link">{{ tra('featured.card-cta') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <p class="lead">{{ tra('featured.no-events') }}</p>
        @endif
    </div>
</div>
@endsection
