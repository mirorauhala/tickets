@extends('layouts.base')

@section('base.title', tra('featured.title'))

@section('base.content')
<div class="container mx-auto">
    <div class="w-7/12 mx-auto">
        <h1 class="text-5xl font-bold mb-3">{{ tra('featured.title') }}</h1>
        @include('events._menu')
        @if(count($events) > 0)
            @foreach($events as $event)
                <a class="block bg-white border border-solid border-gray-300 rounded mb-3 px-10 py-6" href="{{ route('events.show', ['event' => $event]) }}">
                    <h2 class="text-3xl font-bold">{{ $event->name }}</h2>
                    <p class="text-xl text-gray-600">{{ $event->location }}</p>
                    <p class="text-lg">{{ $event->slogan }}</p>
                </a>
            @endforeach
        @else
            <p class="lead">{{ tra('featured.no-events') }}</p>
        @endif
    </div>
</div>
@endsection
