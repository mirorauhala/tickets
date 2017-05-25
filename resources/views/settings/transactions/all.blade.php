@extends('layouts.settings')

@section('settings.title', Helper::tra('settings.panel.title.transactions'))

@section('content')

@if(count($transactions) > 0)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>{{ Helper::tra('settings.transactions.code') }}</td>
                    <td>{{ Helper::tra('settings.transactions.title') }}</td>
                    <td>{{ Helper::tra('settings.transactions.amount') }}</td>
                    <td>{{ Helper::tra('settings.transactions.status') }}</td>
                    <td>{{ Helper::tra('settings.transactions.date') }}</td>
                    <td>{{ Helper::tra('settings.transactions.action') }}</td>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr class="{{ ($transaction->status == "pending") ? "info" : "" }}">
                        <td>{{ $transaction->code }}</td>
                        <td>{{ $transaction->title }}</td>
                        <td>{{ Helper::decimalMoneyFormatter($transaction->total, $transaction->currency) }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td><a href="#">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>{{ Helper::tra('settings.transactions.no-transactions') }}</p>
@endif
@endsection
