@extends('layouts.auth')

@section('base.title', $error_title)

@section('content')
<div class="tw-container tw-mx-auto">
    <div class="row h-75 justify-content-center">
        <div class="col-md-12 align-self-center">
            <h1 class="text-center">{{ $error_title }}</h1>
            <p class="lead text-center">{{ $error_subtext }}</p>
        </div>
    </div>
</div>
@endsection
