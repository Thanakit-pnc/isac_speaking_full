@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box text-dark">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-2">Part {{ $speakings->part }} <i class="fas fa-angle-right font-16 align-middle"></i> Topic {{ $speakings->topic }}</h3>
                        @foreach ($speakings->sound as $key => $sound)
                            <div class="d-flex">
                                <p>Q {{ $key+1 }}: Question {{ $key+1 }}</p>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-0 mr-2">A {{ $key+1 }}:</p>
                                <audio src="{{ asset('public/files/'.$sound->path) }}" controls></audio>
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

                        @if ($errors->all())
                            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif                        

                        <form action="{{ route('store.comment') }}" method="post">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{ $speakings->id }}">

                            <div class="form-group">
                                <label class="col-form-label">NC Band Score</label>
                                <input type="text" name="score" class="form-control" placeholder="Score">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fluency and coherence</label>
                                <textarea class="form-control" name="fluency" placeholder="Fluency and coherence"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Lexical resource</label>
                                <textarea class="form-control" name="lexical" placeholder="Lexical resource"></textarea>
                            </div>
                            <div class="form-group">
                                <label fclass="col-form-label">Grammatical and accuracy</label>
                                <textarea class="form-control" name="grammatical" placeholder="Grammatical and accuracy"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Pronunciation</label>
                                <textarea class="form-control" name="pronunciation" placeholder="Pronunciation"></textarea>
                            </div>

                            <div class="form-group mt-5 text-center">
                                <button type="submit" class="btn btn-success width-lg">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection