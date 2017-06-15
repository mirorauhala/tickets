@extends('layouts.event-admin')

@section('admin.content')
    <h1 id="adminTitle">Orders</h1>
    @if(count($orders) > 0)
        {{ $orders->links() }}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Reference</td>
                    <td>Title</td>
                    <td>Value</td>
                    <td>Status</td>
                    <td>Name</td>
                    <td>Transactions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->reference }}</td>
                        <td>{{ $order->title }}</td>
                        <td>{{ $order->value }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->payer_name }}</td>
                        <td><a href="#">View complete transaction</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    @else
        <p>There are no orders to show.</p>
    @endif
@endsection
