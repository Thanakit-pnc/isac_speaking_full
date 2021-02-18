@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h3 class="mb-3"><i class="mdi mdi-history"></i> Status</h3>

                <table class="table table-hover dt-responsive nowrap datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Part / Topic</th>
                            <th>Submitted</th>
                            <th>Teacher</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("status") }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'part', name: 'speakings.part'},
                    {data: 'created_at', name: 'speakings.created_at'},
                    {data: 'user', name: 'user.name', orderable: false},
                    {data: 'status', name: 'speakings.status'},
                ],
                search: {
                    "regex": true
                }
            });
        });
    </script>
@endsection