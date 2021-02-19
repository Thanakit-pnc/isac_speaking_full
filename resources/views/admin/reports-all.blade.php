@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h2 class="mb-3">Report All</h2>


            <form class="my-4">
               <div class="row">
                   <div class="col-md-6">
                        <div class="form-group">
                            <label for="search_date">Start Date - End Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control input-daterange-datepicker" name="search_daterange" autocomplete="off" placeholder="Start Date - End Date">
                                <div class="input-group-append">
                                    <button class="btn btn-success waves-effect waves-light" id="submit">Submit</button>
                                    <button class="btn btn-dark waves-effect waves-light" id="reset">Reset</button>
                                </div>
                            </div>
                        </div>
                   </div>
               </div>
            </form>

            <table id="datatable" class="table table-bordered table-sm dt-responsive nowrap font-16">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Part / Topic</th>
                        <th>Teacher</th>
                        <th>Student Sent</th>
                        <th>Teacher Sent</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        
            render();
            function render(daterange = '') {
                $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route("reports.all") }}',
                        type: 'post',
                        data: { _token: "{{ csrf_token() }}", daterange: daterange}
                    },
                    columns: [
                        {data: 'student', name: 'student.std_name', orderable: false},
                        {data: 'part_topic', name: 'part_topic'},
                        {data: 'name', name: 'user.name', orderable: false},
                        {data: 'created_at', name: 'speakings.created_at'},
                        {data: 'th_sent_date', name: 'speakings.th_sent_date'},
                    ],
                    order: [[4, 'desc']],
                    search: {
                        "regex": false
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        'excelHtml5',
                        'pdfHtml5'
                    ]
                });
            }

            $('#submit').on('click', function(e) {
                e.preventDefault();
                $('#datatable').DataTable().destroy();
                render($('input[name="search_daterange"]').val());
            });

            $('#reset').on('click', function(e) {
                e.preventDefault();
                $('#datatable').DataTable().destroy();
                render();
            });
      
    </script>
@endsection