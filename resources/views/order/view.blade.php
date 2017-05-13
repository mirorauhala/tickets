@extends('layouts.order')
@section('content')


{{ dd($tickets) }}


<table class="table">
    <thead>
        <tr>
            <td>Name</td>
            <td>Amount</td>
            <td>Price</td>
        </tr>
    </thead>
    <tbody>
        @foreach($tickets as $ticket)

            <tr>
                <td>{{ $ticket['amount'] }}</td>
                <td>{{ $ticket['amount'] }}</td>
                <td>10,00 €</td>
            </tr>

        @endforeach
    </tbody>
</table>

@endsection
