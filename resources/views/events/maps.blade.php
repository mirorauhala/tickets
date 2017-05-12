@extends('layouts.event')

@section('content')

<h1>Maps</h1>
@if(count($maps) > 0)
    @foreach($maps as $map)
        <div class="row ticket">
            <div class="col-md-8">
                <a class="thumbnail clearfix" href="{{ route('events.map', ['map' => $map]) }}">
                    <div class="col-md-12">
                        <h2>{{ $map->name }}</h2>
                        <p>{{ $map->description }}</p>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
@else
    <p>There are no tickets to show.</p>
@endif

@endsection
