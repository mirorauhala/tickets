@extends('layouts.base')

@section('base.title', 'Featured')

@section('base.content')
<div class="container h-100">
    <div class="row align-items-center h-25">
        <div class="col-md-12">
            <p class="lead mb-0">{{ $event->name }}</p>
            <h1 class="mt-0 text-uppercase">Maps</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('dashboard._menu')
        </div>

        @if(count($maps) > 0 )
            <div class="col-md-9">
                @include('partials.messages.flashbox')
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Seats</th>
                            <th scope="col">Active</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maps as $map)
                            <tr>
                                <td>{{ $map->name }}</td>
                                <td>{{ $map->seats()->count() }}</td>
                                <td>{{ $map->active ? 'Yes' : 'No'}}</td>
                                <td><a href="{{ route('dashboard.maps.edit', [$event, $map]) }}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="col-md-9 align-self-center">
                <p class="lead text-muted text-center">Start by creating a new map.</p>
                <p class="lead text-muted text-center"><a href="{{ route('dashboard.maps.create', ['event' => $event]) }}" class="btn btn-primary px-4">New map</a></p>
            </div>
        @endif
    </div>
</div>
@endsection
