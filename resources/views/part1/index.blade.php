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
        <h3 class="text-muted">Part {{ $partNum }} <i class="fas fa-angle-right font-16 align-middle"></i> Topic {{ $topicNum }}</h3>
        <div class="card-box">
            <div class="row d-none d-md-flex">
                <div class="col-6">
                    <h3><i class="fas fa-user-tie"></i> Examiner</h3>
                </div>
                <div class="col-6">
                    <h3><i class="fas fa-user"></i> Candidate</h3> 
                </div>
            </div>

            @for ($i = 1; $i <= 8; $i++)
                <div class="d-flex justify-content-between flex-column flex-md-row align-items-center my-3 rec-container">
                    <div class="d-flex align-items-center flex-1 w-100">
                        <p class="mb-0 mr-2 mr-md-3 font-16 text-dark text-nowrap">Q {{ $i }}:</p>
                        <audio src="#" controls></audio>
                    </div>
                    <div class="d-flex align-items-center flex-1 mt-3 mt-md-0 show-record w-100">
                        <p class="mb-0 mr-2 mr-md-3 font-16 text-dark text-nowrap">A {{ $i }}:</p>
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
<script>
    let timeCount = 3
    totalTime = timeCount;
    let blobObj = {};
    function createDownloadLink(blob) {
        let url = URL.createObjectURL(blob);
        $(recordBox).eq(indexBox).append(`<audio src="${url}" controlsList="nodownload" controls></audio> 
        <button class="btn btn-icon waves-effect waves-light btn-danger btn-sm ml-auto reset" onclick="reset()"> <i class="fas fa-undo"></i> </button>`) 
        blobObj[fileName] = blob;
    }
    
    finishBtn.addEventListener('click', () => {
        let form_data = new FormData();
        form_data.append('part', 1);
        form_data.append('topic', "{{ $topicNum }}")

        for(let answer in blobObj) {
            form_data.append('audio_data[]', blobObj[answer], answer);
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('store.audio') }}",
            type: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
            }
        });
    });

    function reset() {
        $(recordBox).eq(indexBox).find('audio').remove();
        $(recordBox).eq(indexBox).find('.reset').remove();
        $(recordBox).eq(indexBox).find('.record').css('display', 'block')
    }

</script>
@endsection