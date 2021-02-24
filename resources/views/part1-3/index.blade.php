@extends('layouts.app')

@section('css')
    <style>
        .flex-1 {
            flex: 1 !important;
        }

        .reset {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @media(max-width: 768px) {
            audio {
                width: 70%;
            }

            .rec-container {
                border-bottom: 1px solid #ccc;
                padding-bottom: 10px;
            }

            .text-header {
                font-size: 15px;
            }
        }

        @media(max-width: 500px) {
            audio {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3 class="text-muted text-header">Part {{ $partNum }} <i class="fas fa-angle-right align-middle"></i> Set {{ $setNum }} <span class="float-right">{{ $sounds['set_name'] }}</span></h3>
        <div class="clearfix"></div>
        <div class="card-box">
            <div class="row d-none d-md-flex">
                <div class="col-6">
                    <h3><i class="fas fa-user-tie"></i> Examiner</h3>
                </div>
                <div class="col-6">
                    <h3><i class="fas fa-user"></i> Candidate</h3> 
                </div>
            </div>

            @foreach ($sounds['files'] as $sound)
                <div class="d-flex justify-content-between flex-column flex-md-row align-items-center my-3 rec-container">
                    <div class="d-flex align-items-center flex-1 w-100">
                        <p class="mb-0 mr-2 mr-md-3 font-16 text-dark text-nowrap">Q {{ $loop->index+1 }}:</p>
                        <audio src="{{ asset($sound) }}" controls controlsList="nodownload"></audio>
                    </div>
                    <div class="d-flex align-items-center flex-1 mt-3 mt-md-0 show-record w-100">
                        <p class="mb-0 mr-2 mr-md-3 font-16 text-dark text-nowrap">A {{ $loop->index+1 }}:</p>
                        <button class="record btn btn-dark width-lg font-weight-bold"><i class="fas fa-microphone-alt"></i> Record</button>
                    </div>
                </div>
            @endforeach

            <div class="progress mb-2 progress-xl" style="visibility: hidden;">
                <div class="progress-bar bg-info" role="progressbar"></div>
            </div>

            <div class="col-12 text-center mt-4">
                <button id="finish" class="btn btn-success width-lg">Finish</button>
            </div>
        </div>
    </div>
</div>
@endsection

@component('components.audio')
    @slot('title')
        Introduction
    @endslot

    @slot('textBtn')
        Play
    @endslot

    @slot('path')
         {{ $sounds['introduction'] }}
    @endslot
@endcomponent

@section('js')
<script src="{{ asset('public/js/WebAudioRecorder.min.js') }}"></script>
<script src="{{ asset('public/js/record.js') }}"></script>
<script>
    let timeCount = "{{ $time }}"
    totalTime = timeCount;
    let blobObj = {};
    function createDownloadLink(blob) {
        let url = URL.createObjectURL(blob);
        $(recordBox).eq(indexBox).append(`<audio src="${url}" controlsList="nodownload" controls></audio> 
        <button class="btn btn-icon waves-effect waves-light btn-danger btn-sm ml-auto reset" onclick="reset(fileName)"> <i class="fas fa-undo"></i> </button>`) 
        blobObj[fileName] = blob;
    }
    
    finishBtn.addEventListener('click', (e) => {
        if(Object.keys(blobObj).length < 8) {
            alert('Please record all your answers');
            return;
        }
        // e.target.disabled = true;
        let form_data = new FormData();
        form_data.append('part', "{{ $partNum }}");
        form_data.append('set', "{{ $setNum }}")

        for(let answer in blobObj) {
            form_data.append('audio_data[]', blobObj[answer], answer);
        }

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
                        $('.progress').css('visibility', 'visible')
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(percentComplete+'%');
                    }
                }, false);
                return xhr;
            },
            url: "{{ route('store.audio') }}",
            type: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            beforesend: function() {
                $(".progress-bar").width('0%');
            },
            success: function(data) {
                if(data.msg == 'Upload Success') {
                    window.location = data.url;
                }
            }

        });
    });

    function reset(fileName) {
        delete blobObj[fileName]
        $(recordBox).eq(indexBox).find('audio').remove();
        $(recordBox).eq(indexBox).find('.reset').remove();
        $(recordBox).eq(indexBox).find('.record').css('display', 'block')
    }

    $('.record').attr('disabled', true)

    $('#soundModal').modal({
        show: true,
        keyboard: false,
        backdrop: 'static'
    })

    $('#btnPlaySound').on('click', () => {
        $('#audio')[0].play();
        $('#soundModal').modal('hide')
    })

    $('#audio').on('ended', () => {
        $('.record').attr('disabled', false)
    })

</script>
@endsection