@extends('layouts.base')

@section('base.title', tra('dashboard.nav.customers'))

@section('base.content')
<div class="tw-container tw-mx-auto">
    <div class="row pb-5">
        <div class="col-md-12">
            <p class="lead mb-0">{{ $event->name }}</p>
            <h1 class="mt-0 text-uppercase">{{ tra('dashboard.nav.customers') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('dashboard._menu')
        </div>

        @if(count($customers) > 0 )
            <div class="col-md-9">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{ tra('dashboard.customers.table.name') }}</th>
                            <th scope="col">{{ tra('dashboard.customers.table.email') }}</th>
                            <th scope="col">{{ tra('dashboard.customers.table.phone') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->full_name() }}</td>
                                <td>{{ $ticket->email }}</td>
                                <td>{{ $ticket->phone }}</td>
                                <td>Edit</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="col-md-9 align-self-center">
                <p class="lead text-muted text-center">{{ tra('dashboard.customers.no-customers') }}</p>
            </div>
        @endif
    </div>
</div>
@endsection
