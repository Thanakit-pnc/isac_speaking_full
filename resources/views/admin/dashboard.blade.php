@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h2>Dashboard</h2>
            <p class="text-muted">Select up to 1 SACs at a time.</p>

            @if (session()->has('msg'))
                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {!! session()->get('msg') !!}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped w-100 text-nowrap font-16">
                    <thead>
                        <tr>
                            <th class="font-weight-bold">#</th>
                            <th class="font-weight-bold">Student Name</th>
                            <th class="font-weight-bold">Part / Topic</th>
                            <th class="font-weight-bold">Submitted</th>
                            <th class="font-weight-bold">Due Date</th>
                            <th class="font-weight-bold">Check</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($speakings as $key => $speaking)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $speaking->student->std_name }}</td>
                                <td>Part {{ $speaking->part }}-{{ $speaking->topic < 10 ? '0'.$speaking->topic : $speaking->topic }}</td>
                                <td>
                                    <span class="badge badge-success">{{ $speaking->created_at->format('d-m-Y H:i:s') }}</span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $speaking->due_date->diffInDays() <= 1 ? 'danger' : 'warning' }}">{{ $speaking->due_date->diffForHumans() }}</span>
                                </td>
                                <td>
                                    <form action="{{ route('select.update') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $speaking->id }}">
                                        <button type="submit" class="btn btn-primary btn-sm text-uppercase">Select</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection