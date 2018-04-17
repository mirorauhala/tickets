@extends('layouts.base')

@section('base.content')

<h1>{{ tra('event.pages.maps.title') }}</h1>

<ul class="list-unstyled">
    <li>Paikkoja yhteensä: {{ count($seats) }}</li>
    <li>Paikkoja vapaana: {{ count($seats->where('status', '=', 'available')) }}</li>
</ul>

</div>
</section>
<div class="map" style="height: 1003px;
    background-image: url(/images/map-bg.png);
    background-repeat: no-repeat;
    background-position-y: 20px;
    background-position-x: 10px;">

    @foreach($seats as $seat)
        <div class="seat seat-{{ $seat->status }}"  style="height: {{ $seat->height }}px; width: {{ $seat->width }}px; top: {{ $seat->top }}px; left: {{ $seat->left }}px;" data-toggle="tooltip" title="{{ $seat->name }}"></div>
    @endforeach


@endsection
