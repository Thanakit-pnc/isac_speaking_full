@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h2 class="mb-3">Completed</h2>

            <div class="table-responsive">
                <table class="table table-striped dt-responsive" id="datatable">
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
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("completed") }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'student', name: 'student.std_name', orderable: false},
                    {data: 'part_topic', name: 'part_topic'},
                    {data: 'created_at', name: 'speakings.created_at'},
                    {data: 'th_sent_date', name: 'speakings.th_sent_date'},
                    {data: 'view', name: 'view', orderable: false, searchable: false},
                ],
                order: [[4, 'desc']],
                search: {
                    "regex": false
                }
            });
        });
    </script>
@endsection