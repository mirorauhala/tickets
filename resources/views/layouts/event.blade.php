@extends('layouts.base')

@section('base.content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Connection Lan: eSports 2017</h1>

            <p class="text-center lead">Alaseinäjoenkatu 15, 60220 Seinäjoki</p>

            <p class="text-center">
                <a role="presentation" class="btn btn-sm btn-primary" href="{{ route('events.details') }}">Details</a></li>
                <a role="presentation" class="btn btn-sm btn-link" href="#">Maps</a></li>
                <a role="presentation" class="btn btn-sm btn-link" href="#">Tickets</a></li>
                <a role="presentation" class="btn btn-sm btn-link" href="#">Tournaments</a></li>
            </p>

            <br>

            @yield('content')
        </div>
    </div>
</div>
@endsection
