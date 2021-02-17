@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h2 class="mb-3">Pending</h2>

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
                        @foreach ($pendings as $key => $pending)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $pending->student->std_name }}</td>
                                <td>Part {{ $pending->part }}-{{ $pending->topic < 10 ? '0'.$pending->topic : $pending->topic }}</td>
                                <td>
                                    <span class="badge badge-success">{{ $pending->created_at->format('d-m-Y H:i:s') }}</span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $pending->due_date->diffInDays() <= 1 ? 'danger' : 'warning' }}">{{ $pending->due_date->diffForHumans() }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('comment', ['id' => $pending->id]) }}" class="btn btn-success btn-sm">Check</a>
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