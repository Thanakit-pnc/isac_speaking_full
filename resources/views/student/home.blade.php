@extends('layouts.app')

@section('content')
<div class="row text-center">
    <div class="col-md-4">
        <div class="card-box border px-1">
            <h3><i class="fas fa-splotch"></i> Part 1</h3>
            <h4>Please select a topic</h4>
            <p class="text-muted">Each topic will deduct one point from your account</p>
            @for ($i = 1; $i <= 5; $i++)
                <a href="{{ route('full.test', ['part' => 'part1', 'test' => 'test'.$i]) }}" type="button" class="btn btn-bordered-primary waves-effect waves-light m-1">Topic {{ $i < 10 ? '0'.$i : $i }}</a>
            @endfor
        </div>    
    </div>

    <div class="col-md-4">
        <div class="card-box border px-1">
            <h3><i class="fas fa-splotch"></i> Part 2</h3>
            <h4>Please select a topic</h4>
            <p class="text-muted">Each topic will deduct one point from your account</p>

            @for ($i = 1; $i <= 40; $i++)
                <button type="button" class="btn btn-bordered-primary waves-effect waves-light m-1">Topic {{ $i < 10 ? '0'.$i : $i }}</button>
            @endfor
        </div>
    </div>

    <div class="col-md-4">
        <div class="card-box border px-1">
            <h3><i class="fas fa-splotch"></i> Part 3</h3>
            <h4>Please select a topic</h4>
            <p class="text-muted">Each topic will deduct one point from your account</p>
            @for ($i = 1; $i <= 5; $i++)
                <button type="button" class="btn btn-bordered-primary waves-effect waves-light m-1">Topic {{ $i < 10 ? '0'.$i : $i }}</button>
            @endfor
        </div>
    </div>
</div>
@endsection