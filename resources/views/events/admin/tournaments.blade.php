@extends('layouts.event-admin')

@section('admin.content')
    <h1>Tournaments</h1>
    @if(count($tournaments) > 0)
        {{ $customers->links() }}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Tickets</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->full_name() }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ count($customer->tickets) }}</td>
                        <td><a href="#">Profile</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $customers->links() }}
    @else
        <p>There are no tournaments to show. Create a new tournament.</p>
    @endif
@endsection
