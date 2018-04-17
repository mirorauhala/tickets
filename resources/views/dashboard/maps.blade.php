@extends('layouts.base')

@section('base.title', 'Featured')

@section('base.content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row align-items-center h-25">
            <div class="col-md-12">
                <h1>Dashboard for {{ $event->name }}</h1>
                <p class="lead">Viewing maps for the event.</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                @include('dashboard._menu')
            </div>

            @if(count($maps) > 0 )
                <div class="col-md-9">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">In sale</th>
                                <th scope="col">Off sale</th>
                                <th scope="col">Quota</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maps as $map)
                                <tr>
                                    <td>{{ $map->name }}</td>
                                    <td>Edit</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="col-md-9 align-self-center">
                    <p class="lead text-muted text-center">Start by creating a new map.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
