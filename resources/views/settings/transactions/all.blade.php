@extends('layouts.base')

@section('base.content')
<div class="row">
    <div class="col-md-3">
        @include("partials.nav.settings")
    </div>

    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">{{ __('settings.panel.title.transactions') }}</div>

            <div class="panel-body">
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
            </div>
        </div>
    </div>
</div>
@endsection
