@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h2 class="mb-3">Report</h2>


            <form action="{{ route('reports') }}" method="post" class="my-4">
                {{ csrf_field() }}

               <div class="row">
                   <div class="col-md-6">
                        <div class="form-group">
                            <label for="search_date">Start Date - End Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control input-daterange-datepicker" name="search_daterange">
                                <div class="input-group-append">
                                    <button class="btn btn-success waves-effect waves-light" type="submit">Submit</button>
                                    <button class="btn btn-dark waves-effect waves-light" type="submit" name="reset" value="reset">Reset</button>
                                </div>
                            </div>
                        </div>
                   </div>
               </div>
            </form>

            <table id="datatable" class="table table-bordered dt-responsive nowrap font-16">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Teacher</th>
                        <th>Pending</th>
                        <th>Success</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $report->name }}</td>
                            <td>
                                <span class="badge badge-pill badge-warning">{{ $report->Pending }}</span>
                            </td>
                            <td>
                                <span class="badge badge-pill badge-success">{{ $report->Success }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'pdfHtml5'
            ]
        })
    </script>
@endsection