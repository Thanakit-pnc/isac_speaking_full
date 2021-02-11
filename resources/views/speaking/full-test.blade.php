@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="row">
                <div class="col-12">
                    <h3 class="m-0 text-right"><i class="fas fa-clock"></i> <span id="min">00</span>:<span id="sec">20</span></h3>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <h3><i class="fas fa-user-tie"></i> Examiner</h3>
                </div>
                <div class="col-6">
                    <h3><i class="fas fa-user"></i> Candidate</h3>
                </div>
            </div>

            @for ($i = 1; $i <= 8; $i++)
                <div class="d-flex justify-content-between align-items-center my-3">
                    <div class="d-flex align-items-center w-50">
                        <p class="mb-0 mr-3 font-16">{{ $i }}</p>
                        <audio src="#" controls></audio>
                    </div>
                    <div class="w-50 px-2 show-record">
                        <button class="record btn btn-dark width-lg font-weight-bold"><i class="fas fa-microphone-alt"></i> Record</button>
                    </div>
                </div>
            @endfor

            <div class="col-12 text-center mt-5">
                <button id="finish" class="btn btn-success width-lg">Finish</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('public/js/WebAudioRecorder.min.js') }}"></script>
<script src="{{ asset('public/js/record.js') }}"></script>
@endsection