@extends('layouts.auth')

@section('base.title', $error_title)

@section('content')
<div class="container h-100">
    <div class="bg-white px-3 h-100">
        <div class="row justify-content-center h-75">
            <div class="col-md-10 align-self-center">
                <h1 class="text-center">{{ $error_title }}</h1>
                <p class="lead text-center">{{ $error_subtext }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
