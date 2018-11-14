@extends('layouts.base')

@section('base.title', tra('bank.title'))

@section('base.content')
<div class="container h-100">
    <div class="row py-5 justify-content-center align-items-center">
        <div class="col-md-12">
            <h1 class="text-uppercase">{{ tra('bank.title') }}</h1>
            <p class="lead">{{ tra('bank.lead') }}</p>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach ($banks as $bankX)
            @foreach ($bankX as $bank)
                <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                    <form method='post' action='{{ $bank['url'] }}'>
                        @foreach ($bank as $key => $value)
                            <input type='hidden' name='{{ $key }}' value='{{ $value }}' />
                        @endforeach
                        <input type='image' src='{{ $bank['icon'] }}' />
                    </form>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
@endsection
