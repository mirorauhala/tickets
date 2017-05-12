@extends('layouts.settings')

@section('settings.title', __('settings.panel.title.transactions'))

@section('content')

@if(count($transactions) > 0)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>{{ __('settings.transactions.code') }}</td>
                    <td>{{ __('settings.transactions.title') }}</td>
                    <td>{{ __('settings.transactions.amount') }}</td>
                    <td>{{ __('settings.transactions.status') }}</td>
                    <td>{{ __('settings.transactions.date') }}</td>
                    <td>{{ __('settings.transactions.action') }}</td>
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
    <p>{{ __('settings.transactions.no-transactions') }}</p>
@endif
@endsection
