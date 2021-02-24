@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary py-2">
                    <h3 class="text-center text-white m-0">Topic {{ $data['topic'] }}</h3>
                </div>
                <div class="card-body">
                    <a href="{{ asset($data['images']) }}" class="image-popup" title="Topic {{ $data['topic'] }}">
                        <img src="{{ asset($data['images']) }}" class="img-fluid" alt="work-thumbnail">
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">

            <h2 id="timer" class="mt-0 text-primary text-center display-4">02:00</h2>
            <div class="progress progress-xl mb-2 d-none">
                <div class="progress-bar bg-success" role="progressbar"></div>
            </div>

            <div class="text-center">
                <button class="btn btn-primary btn-sm width-lg d-none" type="button" disabled="" id="loading">
                    <span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>
                    Recording...
                </button>
                <button id="play" class="btn btn-primary btn-sm width-lg"><i class="fas fa-microphone"></i> Record</button>
                <button id="finish" class="btn btn-success btn-sm d-none"><i class="fas fa-upload"></i> Finish</button>
                <button id="reset" class="btn btn-warning btn-sm d-none"><i class="fas fa-undo"></i> Reset</button>
            </div>

            <div class="font-16 text-center d-none" id="encode-process">
                <div class='spinner-grow text-dark mr-2 align-middle' role='status'></div>
                <p>This process may take several seconds to a few minutes</p>
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
    let timeCount = 120
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

        finishBtn.addEventListener('click', function() {
            let form_data = new FormData();
            form_data.append('topic', "{{ $data['topic'] }}")
            form_data.append('audio_data', blob, "{{ $data['topic'] }}")

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = ((evt.loaded / evt.total) * 100);
                            $('.progress').removeClass('d-none')
                            $(".progress-bar").width(percentComplete + '%');
                            $(".progress-bar").html(percentComplete+'%');
                        }
                    }, false);
                    return xhr;
                },
                url: "{{ route('part2.upload') }}",
                type: 'POST',
                data: form_data,
                processData: false,
                contentType: false,
                beforesend: function() {
                    $(".progress-bar").width('0%');
                },
                success: function(data) {
                    if(data.msg == 'Upload Success') {
                        window.location = data.url
                        localStorage.removeItem('listen');
                    }
                }

            });
        })
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