@extends('layouts.base')

@section('base.title', tra('featured.title'))

@section('base.content')
<div class="container pt-5">
    <div class="row pb-5 pt-4">
        <div class="col-12">
            <h1>{{ tra('featured.title') }}</h1>
        </div>
        <div class="col-md-12">
            @include('events._menu')
        </div>
    </div>
    <div class="row">
        @if(count($events) > 0)
            @foreach($events as $event)
            <div class="col-12 col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text mb-2 text-muted">{{ $event->location }}</p>
                        <a href="{{ route('events.show', ['event' => $event]) }}" class="card-link">{{ tra('featured.card-cta') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12">
                <p class="lead">{{ tra('featured.no-events') }}</p>
            </div>
        @endif
    </div>
</div>
@endsection
