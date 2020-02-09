@extends('layouts.base')

@section('base.title', $event->name)

@section('base.content')
<header class="h-40 bg-cover bg-no-repeat bg-center" style="background-image: url('https://images.unsplash.com/photo-1517433456452-f9633a875f6f?ixlib=rb-1.2.1&auto=format&fit=crop&w=2378&q=80')">
    <div class="container h-full flex flex-col items-center text-white">
        <h1 class="text-5xl font-bold mb-3">{{ $event->name }}</h1>
        <p class="text-xl ">{{ $event->location }} &middot; {{ optional($event->date)->format("d/m/Y") }}</p>
    </div>
</header>

<div class="py-3 border-b border-gray-200">
    <nav>
        <ul class="flex justify-center">
            <li class="px-3">
                <a href="#" class="text-gray-700">Liput</a>
            </li>
            <li class="px-3">
                <a href="#" class="text-gray-700">Kartta</a>
            </li>
            <li class="px-3">
                <a href="#" class="text-gray-700">Tietoa</a>
            </li>
        </ul>
    </nav>
</div>

<div class="container flex flex-col items-center pt-5">
    @if(count($tickets) > 0)
        @foreach($tickets as $ticket)
            <div class="w-7/12 mb-3">
                <div class="border border-gray-200">
                    <div class="p-5">
                        <h2 class="font-bold text-3xl">{{ $ticket->name}} - {{ money($ticket->price, "EUR") }}</h2>
                        <p class="card-text">Alkaen </p>
                        <form action="{{ route('orders.create', $event) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                            <label for="ticket_amount">Määrä</label>
                            <input-counter max="{{ $ticket->maxAmountPerTransaction }}"></input-counter>
                            <app-button theme="primary" type="submit">Lisää ostoskoriin</app-button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col align-self-center">
            <p class="lead text-center text-muted">There are no tickets to show.</p>
        </div>
    @endif
</div>

    <div class="row">
        <div class="col-md-12">
            <h2>Kartta</h2>
            <p>Paikkoja yhteensä: {{ count($seats) }}</p>
            <p>Paikkoja vapaana: {{ count($seats->where('status', '=', 'available')) }}</p>
        </div>
    </div>

    <div class="row mb-5 pb-5">
        <div class="table-responsive">
            <div class="map" style="height: 474px; width: 886px;
                background-image: url('/images/background.png');
                background-repeat: no-repeat;
                overflow: auto;">

                @foreach($seats as $seat)
                    <div class="seat seat-{{ $seat->status }}"  style="height: {{ $seat->height }}px; width: {{ $seat->width }}px; top: {{ $seat->top }}px; left: {{ $seat->left }}px;" data-toggle="tooltip" title="{{ $seat->name }}"></div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
