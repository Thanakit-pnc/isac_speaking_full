@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-md-12">
        @if (session('msg'))
            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ session('msg') }}
            </div>
        @endif
        <div class="card-box text-center">
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
                    @for ($i = 1; $i <= 10; $i++) 
                        <a href="{{ route('part', ['part' => '1', 'set' => 'set'.$i]) }}"
                        type="button" class="btn btn-primary waves-effect waves-light m-1 {{ $i > 9 ? 'disabled' : ''}}">Set
                        {{ $i < 10 ? '0'.$i : $i }}</a>
                    @endfor
                </div>
                <div class="tab-pane fade" id="part2">
                    <h4>Please select a topic</h4>
                    <p class="text-muted">Each topic will deduct one point from your account</p>

                    @for ($i = 1; $i <= 40; $i++) 
                        <a href="{{ route('part2.intro', ['number' => $i]) }}" type="button" class="btn btn-bordered-primary waves-effect waves-light m-1">Topic {{ $i < 10 ? '0'.$i : $i }}</a>
                     @endfor
                </div>
                <div class="tab-pane fade" id="part3">
                    <h4>Please select a topic</h4>
                    <p class="text-muted">Each topic will deduct one point from your account</p>
                    @for ($i = 1; $i <= 10; $i++) 
                        <a href="{{ route('part', ['part' => '3', 'set' => 'set'.$i]) }}" type="button" class="btn btn-bordered-primary waves-effect waves-light m-1 {{ $i > 9 ? 'disabled' : ''}}">Set {{ $i < 10 ? '0'.$i : $i }}</a>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection