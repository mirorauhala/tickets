@extends('layouts.event-admin')

@section('admin.content')
    <h1>Customers</h1>
    @if(count($customers) > 0)
        {{ $customers->links() }}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->full_name() }}</td>
                        <td>{{ $customer->email }}</td>
                        <td><a href="#">Profile</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $customers->links() }}
    @else
        <p>There are no customers to show.</p>
    @endif
@endsection
