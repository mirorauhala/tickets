@extends('layouts.base')

@section('base.title', tra('errors.internal-server-error.title'))

@section('base.content')
<div class="container mx-auto">
    <div class="flex flex-col text-center">
        <h1 class="text-4xl font-bold pb-1">{{ tra('errors.internal-server-error.title') }}</h1>
        <p class="text-2xl">{{ tra('errors.internal-server-error.subtext') }}.</p>
    </div>
</div>
@endsection
