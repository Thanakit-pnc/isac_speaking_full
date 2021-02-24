<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Speaking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ReportAllController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()) {

            $model = Speaking::select('id', 'std_id', 'th_id','created_at', 'th_sent_date', DB::raw("CONCAT('Part ', part, '-', IF(topic < 10, CONCAT('0', topic), topic)) as part_topic"))->with(['student', 'user'])
                ->where('status', 'success');

            return DataTables::eloquent($model)
                ->editColumn('student', function (Speaking $speaking) {
                    $route = route('report_view', ['id' => $speaking->id]);
                    return "<a href='$route'>{$speaking->student->std_name}</a>";
                })
                ->editColumn('name', function (Speaking $speaking) {
                    return $speaking->user->name;
                })
                ->editColumn('created_at', function (Speaking $speaking) {
                    return '<span class="badge badge-dark">'.$speaking->created_at->format('d-M-Y H:i:s').'</span>';
                })
                ->editColumn('th_sent_date', function (Speaking $speaking) {
                    return '<span class="badge badge-success">'.$speaking->th_sent_date->format('d-M-Y H:i:s').'</span>';
                })
                ->rawColumns(['student', 'created_at', 'th_sent_date'])
                ->filterColumn('part_topic', function($query, $keyword) {
                    $sql = "CONCAT('Part ', part, '-', topic)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filter(function ($query) use ($request) {
                    if (request()->has('daterange')) {

                        $explode_date = explode(' - ', request('daterange'));
                        $start = date('Y-m-d 00:00:00', strtotime($explode_date[0]));
                        $end = date('Y-m-d 23:59:59', strtotime($explode_date[1]));
                        
                        $date_range = [$start, $end];

                        $query->whereBetween('th_sent_date', $date_range);
                    }
                })
                ->make(true);
        }

        return view('admin.reports-all');
    }
}
