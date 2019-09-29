@extends('layouts.base')

@section('base.title', tra('errors.method-not-allowed.title'))

@section('base.content')
<div class="tw-container tw-mx-auto">
    <div class="tw-flex tw-flex-col tw-text-center">
        <h1 class="tw-text-4xl tw-font-bold tw-pb-1">{{ tra('errors.method-not-allowed.title') }}</h1>
        <p class="tw-text-2xl">{{ tra('errors.method-not-allowed.subtext') }}</p>
    </div>
</div>
@endsection
