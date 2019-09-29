@extends('layouts.base')

@section('base.title', tra('errors.not-found.title'))

@section('base.content')
<div class="tw-container tw-mx-auto">
    <div class="tw-flex tw-flex-col tw-text-center">
        <h1 class="tw-text-4xl tw-font-bold tw-pb-1">{{ tra('errors.not-found.title') }}</h1>
        <p class="tw-text-2xl">{{ tra('errors.not-found.subtext') }}</p>
    </div>
</div>
@endsection
