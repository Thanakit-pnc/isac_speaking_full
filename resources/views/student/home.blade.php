@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card-box text-center">
            <h1>Half Test</h1>
            @for ($i = 1; $i <= 40; $i++)
                <button type="button" class="btn btn-bordered-purple waves-effect waves-light m-1">Topic {{ $i < 10 ? '0'.$i : $i }}</button>
            @endfor
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-box text-center">
            <h1>Full Test</h1>
            @for ($i = 1; $i <= 5; $i++)
                <a href="{{ route('full.test', 'test'.$i) }}" type="button" class="btn btn-bordered-primary waves-effect waves-light m-1">Speaking Test {{ $i < 10 ? '0'.$i : $i }}</a>
            @endfor
        </div>
    </div>
</div>
@endsection