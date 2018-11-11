@extends('layouts.base')

@section('base.title', tra('featured.title'))

@section('base.content')
<div class="container h-100">
    <div class="row py-5 justify-content-center align-items-center">
        <div class="col-md-12">
            <h1>{{ tra('featured.title') }} / All</h1>
            <p class="lead">{{ tra('featured.lead') }}</p>
        </div>
        <div class="col-md-12">
            @include('events._menu')
        </div>
    </div>
    <div class="row">
        @if(count($events) > 0)
            @foreach($events as $event)
            <div class="col-md-4 col-lg-4">
                <div class="card mb-3 ">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text mb-2 text-muted">{{ $event->location }}</p>
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
@endsection