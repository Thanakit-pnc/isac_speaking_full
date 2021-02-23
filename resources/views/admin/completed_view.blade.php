@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-6 font-16">
                        @component('components.admin.audio_comment', ['speakings' => $speakings, 'questions' => $questions]) 
                        @endcomponent
                    </div>
                    <div class="col-sm-6">
                        <div class="media mb-2 mt-1">
                            <img class="d-flex mr-2 rounded-circle avatar-sm" src="{{ asset('public/assets/images/users/avatar-2.jpg') }}" alt="Generic placeholder image">
                            <div class="media-body">
                                <span class="float-right">{{ $speakings->created_at->format('d-m-Y H:i') }}</span>
                                <h6 class="m-0 font-16 text-primary">{{ $speakings->student->std_name }}</h6>
                                <p class="mt-1 mb-0">
                                    <span class="mr-2"><u class="font-weight-bold">Course</u> : KeySkills</span>
                                    <span><u class="font-weight-bold">Teacher</u> : Henry.D</span>
                                </p>
                                <p>
                                    <span class="mr-2"><u class="font-weight-bold">Expected Score</u> : 9</span>
                                    <span><u class="font-weight-bold">Current Course</u> : Keyskills Extension</span>
                                </p>
                            </div>
                        </div>


                        <div class="d-flex align-items-center">
                            <h4>NC Band Score : {{ $speakings->score }}</h4>
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
