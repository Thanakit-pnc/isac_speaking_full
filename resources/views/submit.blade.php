@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card-box">
                
                @component('components.submit_score')
                    @slot('title')
                        Part {{ $speaking->part }} | Topic {{ $speaking->topic }}   
                    @endslot

                    @slot('id')
                        {{ $speaking->id }}
                    @endslot

                    @slot('route')
                        {{ $route }}
                    @endslot

                    @slot('sound_ended')
                        {{ $sound_ended }}
                    @endslot
                @endcomponent

                <div class="text-left text-muted mt-3">
                    <p>After you submit your test, an experienced IELTS teacher will listen to your recording and provide an NC Band Score as well as some feedback on how you can improve. </p>

                    <p class="mb-0">Please check the <b><i>Status</i></b> tab to track your test, which will be returned to you in 1 – 6 days.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

        $('input[type="submit"]').attr('disabled', true);
        
        $('#soundModal').modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        })

        $('#btnPlaySound').on('click', () => {
            $('#audio')[0].play();
            $('#soundModal').modal('hide');
        })

        $('#audio').on('ended', () => {
            $('input[type="submit"]').attr('disabled', false);
        })

    </script>
@endsection