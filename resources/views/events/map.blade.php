@extends('layouts.event')

@section('content')

<h1>{{ Helper::tra('event.pages.maps.title') }} / {{ $map->name }}</h1>
<p>{{ $map->description }}</p>

</div>
</div>
</div>
<div class="map" style="height: 500px">

    @foreach($seats as $seat)
        <div class="seat seat-{{ $seat->status }}" style="height: 20px; width: 20px; top: {{ $seat->top }}px; left: {{ $seat->left }}px;"></div>
    @endforeach


@endsection
