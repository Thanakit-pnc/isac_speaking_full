@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card-box">
                <h3 class="text-center mb-3">Part {{ $speaking->part }} | Topic {{ $speaking->topic }}</h3>
                <form action="{{ route('store.submit') }}" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{ $speaking->id }}">

                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Expected Score</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" name="expected_score" placeholder="Expected Score" required>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label class="col-sm-auto col-form-label">Current Course</label>
                        <div class="col-sm">
                            <select name="current_course" class="form-control" required>
                                <option value="" disabled selected>Select Course</option>
                                <option value="-">-</option>
                                <option value="Foundation for IELTS">Foundation for IELTS</option>
                                <option value="Foundation Extension">Foundation Extension</option>
                                <option value="Key Skills">Key Skills</option>
                                <option value="Key Skills Extension">Key Skills Extension</option>
                                <option value="Speak Write">Speak Write</option>
                                <option value="IELTS Extension">IELTS Extension</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-center pt-2">
                        <input type="submit" value="Submit" class="btn btn-primary width-lg">
                    </div>
                </form>

                <div class="text-left text-muted mt-3">
                    <p>After you submit your test, an experienced IELTS teacher will listen to your recording and provide an NC Band Score as well as some feedback on how you can improve. </p>

                    <p class="mb-0">Please check the <b><i>Status</i></b> tab to track your test, which will be returned to you in 1 – 6 days.</p>
                </div>
            </div>
        </div>
    </div>
@endsection