@extends('layouts.event-admin')

@section('admin.content')
    <h1 id="adminTitle">Orders</h1>
    @if(count($orders) > 0)
        {{ $orders->links() }}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Title</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->title }}</td>
                        <td>{{ $order->email }}</td>
                        <td><a href="#">Profile</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    @else
        <p>There are no orders to show.</p>
    @endif
@endsection
