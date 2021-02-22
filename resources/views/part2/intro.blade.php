@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-center text-white m-0">Topic {{ $data['topic'] }}</h3>
                </div>
                <div class="card-body">
                    <a href="{{ asset($data['images']) }}" class="image-popup" title="Topic {{ $data['topic'] }}">
                        <img src="{{ asset($data['images']) }}" class="img-fluid" alt="work-thumbnail">
                    </a>
                </div>
            </div>

            <h1 id="timer" class="text-center display-4 font-weight-bold text-primary">01:20</h1>
        </div>
    </div>
@endsection

@component('components.audio')
    @slot('title')
        Click to start
    @endslot

    @slot('textBtn')
        Start
    @endslot

    @slot('path')
         {{ $data['sound_intro'] }}
    @endslot
@endcomponent


@section('js')
    <script>
        
        let totalTime = 80;
        function setTime() {
            totalTime--

            let minutes = Math.floor(totalTime / 60)
            let seconds = totalTime % 60

            let min = minutes < 10 ? '0' + minutes : minutes
            let sec = seconds < 10 ? '0' + seconds : seconds

            $('#timer').text(min + ':' + sec)

            if (totalTime === 0) {
                location.href = "{{ route('part2.record', ['number' => $data['topic']]) }}"
            }
        }

        function startTime() {
            timer = setInterval(setTime, 1000)
        }

        function stopTime() {
            clearInterval(timer)
        }

        $('#soundModal').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        })

        $('#btnPlaySound').on('click', () => {
            // $('#audio')[0].play();
            startTime()
            $('#soundModal').modal('hide')
        })
    </script>
@endsection