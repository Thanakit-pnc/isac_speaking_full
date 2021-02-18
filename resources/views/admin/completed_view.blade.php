@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-2">Part {{ $speakings->part }} <i class="fas fa-angle-right font-16 align-middle"></i> Topic {{ $speakings->topic }}</h3>
                        @foreach ($speakings->sound as $key => $sound)
                            <div class="d-flex">
                                <p>Q {{ $key+1 }}: Question {{ $key+1 }}</p>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-0 mr-2">A {{ $key+1 }}:</p>
                                <audio class="w-75" src="{{ asset('public/files/'.$sound->path) }}" controls></audio>
                            </div>
                        @endforeach
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
