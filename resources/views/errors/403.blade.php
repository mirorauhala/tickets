@extends('layouts.base')

@section('base.title', tra('errors.forbidden.title'))

@section('base.content')
<div class="container mx-auto">
    <div class="flex flex-col text-center">
        <h1 class="text-4xl font-bold pb-1">{{ tra('errors.forbidden.title') }}</h1>
        <p class="text-2xl">{{ tra('errors.forbidden.subtext') }}</p>
    </div>
</div>
@endsection
