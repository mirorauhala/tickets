@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">{{ Helper::tra('errors.forbidden.title') }}</h1>
        <p class="lead text-center">{{ Helper::tra('errors.forbidden.subtext') }}</p>
    </div>
</div>
@endsection
