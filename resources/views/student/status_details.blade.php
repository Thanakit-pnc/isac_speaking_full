@extends('layouts.app')

@section('css')
    <style>
        .border-w-2 {
            border-width: 2px !important;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6 font-16">
                        @component('components.admin.audio_comment', ['speakings' => $speakings, 'questions' => $questions]) 
                        @endcomponent
                    </div>
                    <div class="col-md-6">
                        
                        <div class="text-right mb-3">
                            <span class="badge badge-success font-16">Teacher : {{ $speakings->user->name }}</span>
                        </div>

                        <div class="border border-w-2 p-2 mb-2 font-15">
                            The scores awarded reflect your performance in this Part {{ $speakings->part }} Speaking Test only and do not anticipate an IELTS band score. They relate to the scores set out in <a href="{{ asset('public/assets/pdf/speaking-band-descriptors.pdf') }}" download>the IELTS Band Descriptors</a>.
                        </div>

                        <div class="d-flex align-items-center d-flex justify-content-between">
                            <h5>NC Band Score : <span class="badge badge-pill badge-primary font-14">{{ $speakings->score }}</span></h5>
                            <h5>Expected Score : <span class="badge badge-pill badge-warning font-14">{{ $speakings->expected_score }}</span></h5>
                        </div>

                        <div class="border-bottom">
                            <h4><i class="far fa-comment-dots"></i> Fluency and coherence</h4>
                            <p class="lead">
                                {{ $speakings->fluency_and_coherence }}
                            </p>
                        </div>
                        <div class="border-bottom">
                            <h4><i class="far fa-comment-dots"></i> Lexical resource</h4>
                            <p class="lead">
                                {{ $speakings->lexical_resource }}
                            </p>
                        </div>
                        <div class="border-bottom">
                            <h4><i class="far fa-comment-dots"></i> Grammatical range and accuracy</h4>
                            <p class="lead">
                                {{ $speakings->grammar_range_and_acc }}
                            </p>
                        </div>
                        <div class="border-bottom">
                            <h4><i class="far fa-comment-dots"></i> Pronunciation</h4>
                            <p class="lead">
                                {{ $speakings->pronunciation }}
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
