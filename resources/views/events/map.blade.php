@extends('layouts.event')

@section('content')

<h1>{{ Helper::tra('event.pages.maps.title') }}</h1>

</div>
</section>
<div class="map" style="height: 580px;
    background-image: url(/images/map-bg.png);
    background-repeat: no-repeat;
    background-position-y: 20px;
    background-position-x: 10px;">

    @foreach($seats as $seat)
        <div class="seat seat-{{ $seat->status }}" style="height: 15px; width: 15px; top: {{ $seat->top }}px; left: {{ $seat->left }}px;"></div>
    @endforeach


@endsection
