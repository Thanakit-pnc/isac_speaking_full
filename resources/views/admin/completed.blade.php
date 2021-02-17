@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h2 class="mb-3">Completed</h2>

            <div class="table-responsive">
                <table class="table table-striped dt-responsive nowrap" id="basic-datatable">
                    <thead>
                        <tr>
                            <th class="font-weight-bold">#</th>
                            <th class="font-weight-bold">Student Name</th>
                            <th class="font-weight-bold">Part / Topic</th>
                            <th class="font-weight-bold">Submitted</th>
                            <th class="font-weight-bold">Checked</th>
                            <th class="font-weight-bold">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($completes as $key => $complete)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $complete->student->std_name }}</td>
                                <td>Part {{ $complete->part }}-{{ $complete->topic < 10 ? '0'.$complete->topic : $complete->topic }}</td>
                                <td>
                                    <span class="badge badge-success">{{ $complete->created_at->format('d-m-Y H:i:s') }}</span>
                                </td>
                                <td>
                                    <span class="badge badge-dark">{{ $complete->th_sent_date->format('d-m-Y H:i:s') }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('completed.view', ['id' => $complete->id]) }}" class="btn btn-primary btn-sm">View</a>
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