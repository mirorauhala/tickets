@extends('layouts.base')

@section('base.content')
<div class="container h-100">
    <div class="bg-white py-3 pb-5 h-100">
        <div class="row justify-content-center align-items-center h-25">
            <div class="col-md-10">
                <h1>Choose bank</h1>
                <p class="lead">Asd</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    @foreach ($banks as $bankX)
                        @foreach ($bankX as $bank)
                            <div class="col-sm-4 col-md-4">
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
        </div>
    </div>
</div>
@endsection
