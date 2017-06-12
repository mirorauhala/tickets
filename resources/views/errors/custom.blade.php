@extends('layouts.auth')

@section('base.title', $error_title)

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">{{ $error_title }}</h1>
        <p class="lead text-center">{{ $error_subtext }}</p>
    </div>
</div>
@endsection
