@extends('layouts.app')

@section('content')
<div class="row text-center">

    <div class="col-md-12">
        <div class="card-box">
            <ul class="nav nav-pills navtab-bg nav-justified">
                <li class="nav-item">
                    <a href="#part1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        <span class="d-inline-block d-sm-none"><i class="mdi mdi-numeric-1-circle-outline mdi-24px align-middle"></i></span>
                        <span class="d-none d-sm-inline-block">Part 1</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#part2" data-toggle="tab" aria-expanded="true" class="nav-link">
                        <span class="d-inline-block d-sm-none"><i class="mdi mdi-numeric-2-circle-outline mdi-24px align-middle"></i></span>
                        <span class="d-none d-sm-inline-block">Part 2</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#part3" data-toggle="tab" aria-expanded="false" class="nav-link">
                        <span class="d-inline-block d-sm-none"><i class="mdi mdi-numeric-3-circle-outline mdi-24px align-middle"></i></span>
                        <span class="d-none d-sm-inline-block">Part 3</span>  
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="part1">
                    <h4>Please select a topic</h4>
                    <p class="text-muted">Each topic will deduct one point from your account</p>
                    @for ($i = 1; $i <= 5; $i++) 
                        <a href="{{ route('part1', ['part' => '1', 'topic' => 'topic'.$i]) }}"
                        type="button" class="btn btn-bordered-primary waves-effect waves-light m-1">Topic
                        {{ $i < 10 ? '0'.$i : $i }}</a>
                    @endfor
                </div>
                <div class="tab-pane fade" id="part2">
                    <h4>Please select a topic</h4>
                    <p class="text-muted">Each topic will deduct one point from your account</p>

                    @for ($i = 1; $i <= 40; $i++) 
                        <button type="button" class="btn btn-bordered-primary waves-effect waves-light m-1">Topic {{ $i < 10 ? '0'.$i : $i }}</button>
                     @endfor
                </div>
                <div class="tab-pane fade" id="part3">
                    <h4>Please select a topic</h4>
                    <p class="text-muted">Each topic will deduct one point from your account</p>
                    @for ($i = 1; $i <= 5; $i++) 
                        <button type="button" class="btn btn-bordered-primary waves-effect waves-light m-1">Topic {{ $i < 10 ? '0'.$i : $i }}</button>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection