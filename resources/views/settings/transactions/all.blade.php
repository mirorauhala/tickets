@extends('layouts.settings')

@section('settings.title', __('settings.panel.title.transactions'))

@section('content')

@if(count(Auth::user()->transactions) > 0)
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>{{ __('settings.transactions.id') }}</td>
                    <td>{{ __('settings.transactions.title') }}</td>
                    <td>{{ __('settings.transactions.payer') }}</td>
                    <td>{{ __('settings.transactions.cost') }}</td>
                    <td>{{ __('settings.transactions.currency') }}</td>
                    <td>{{ __('settings.transactions.vat') }}</td>
                </tr>
            </thead>
            <tbody>
                @foreach(Auth::user()->transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->title }}</td>
                        <td>{{ $transaction->payer->first()->full_name() }}</td>
                        <td>{{ Helper::decimalMoneyFormatter($transaction->cost, $transaction->currency) }}</td>
                        <td>{{ $transaction->currency }}</td>
                        <td>{{ $transaction->vat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>{{ __('settings.transctions.no-transactions') }}</p>
@endif
@endsection
