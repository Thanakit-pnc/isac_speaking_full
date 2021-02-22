@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-center text-white m-0">Topic {{ $data['topic'] }}</h3>
                </div>
                <div class="card-body">
                    <img src="{{ asset($data['images']) }}" alt="" class="w-100">
                </div>
            </div>

            <div class="progress progress-xl mb-2 d-none">
                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>

            <div class="d-flex justify-content-between">
                <h3 id="timer" class="m-0">02:00</h3>
                <div>
                    <button class="btn btn-primary btn-sm d-none" type="button" disabled="" id="loading">
                        <span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>
                        Recording...
                    </button>
                    <button id="play" class="btn btn-primary btn-sm">Record</button>
                    <button id="finish" class="btn btn-success btn-sm d-none">Finish</button>
                    <button id="reset" class="btn btn-warning btn-sm d-none">Reset</button>
                </div>
            </div>
            
            <div class="mt-2 border-top border-primary bg-white p-2 d-none" style="border-width: 2px !important;">
                <h3 class="mt-0 mb-3">Sound Record</h3>
                <div id="audio-container"></div>
            </div>
        </div>
    </div>
@endsection

@component('components.audio')
    @slot('title')
        Record
    @endslot

    @slot('content')
        <div class="font-16 text-dark">
            <p class="mb-0">When recording, make sure to <span class="font-italic font-weight-bold">speak clearly</span></p>
            <p>into your microphone <img src="{{ asset('public/assets/images/speak_icon.jpg') }}" alt="" width="40"></p>
        </div>
    @endslot

    @slot('textBtn')
        Continue
    @endslot

    @slot('path')
         {{ $data['sound_record'] }}
    @endslot
@endcomponent

@section('js')
<script src="{{ asset('public/js/WebAudioRecorder.min.js') }}"></script>
<script src="{{ asset('public/js/recordP2.js') }}"></script>
<script>
    let timeCount = 3
    totalTime = timeCount;

    function createDownloadLink(blob) { 
        let url = URL.createObjectURL(blob);

        audioContainer.innerHTML = `
            <audio src="${url}" controls controlsList="nodownload" class="w-100"></audio>
        `; 

        audioContainer.parentElement.classList.remove('d-none');

        loadingBtn.classList.add('d-none');
        finishBtn.classList.remove('d-none');
        resetBtn.classList.remove('d-none');
    }

    if(!localStorage.getItem('listen')) {

        $('#play').attr('disabled', true);

        $('#soundModal').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        })

        $('#audio').on('ended', () => {
            $('#play').attr('disabled', false);
        })

    } 

    $('#btnPlaySound').on('click', () => {
        $('#audio')[0].play();
        $('#soundModal').modal('hide')
        localStorage.setItem('listen', true);
    })

</script>
@endsection