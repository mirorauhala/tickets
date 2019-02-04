@extends('layouts.base')

@section('base.title', tra('tickets.title'))

@section('base.content')
<div class="container">
    <div class="row pb-5 pt-4">
        <div class="col-md-12">
            <h1>{{ tra('tickets.title')}} <small class="text-muted"> / Share ticket {{ $item->title }}</small></h1>
            <p class="lead">{{ tra('tickets.lead-share')}}</p>

            @include('tickets._menu')
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @if(empty($item->redeem_code))
                <p><b>Lunastuskoodi:</b> <span class="text-muted">Ei asetettu</span></p>
            @else
                <p><b>Lunastuskoodi</b>: {{ $item->redeem_code }}</p>
            @endif

            @if($item->user_id == auth()->user()->id)
                <p>Ticket has not been redeemed.</p>
            @else
                <p>Ticket has been redeemed by <b>{{ $item->user()->full_name() }}</b>.</p>
            @endif

            <p>
                @if(empty($item->redeem_code))
                    <a onclick="event.preventDefault();
                        document.getElementById('create-redeem').submit();"
                        href="#" class="btn btn-primary" >Luo koodi</a>
                @else
                    <a onclick="event.preventDefault();
                            document.getElementById('create-redeem').submit();"
                            href="#" class="btn btn-primary" >Luo uusi koodi</a>
                @endif


                <a onclick="event.preventDefault();
                            document.getElementById('delete-redeem').submit();"
                            href="#" class="btn btn-primary" >Poista koodi</a>
            </p>
            <form id="create-redeem" action="{{ route('tickets.redeem.create', $item->barcode) }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

            <form id="delete-redeem" action="{{ route('tickets.redeem.delete', $item->barcode) }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
@endsection
