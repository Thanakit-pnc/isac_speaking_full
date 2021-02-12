@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            @foreach ($sounds as $key => $sound)
                <div class="my-3 d-flex flex-column">
                    <h4>Question {{ $key+1 }}</h4>
                    <audio src="{{ $sound->getPathName() }}" controls></audio>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection