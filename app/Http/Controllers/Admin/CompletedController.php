<?php

namespace App\Http\Controllers\Admin;

use DB;
use DataTables;
use App\Models\PartOne;
use App\Models\Student;
use App\Models\Speaking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompletedController extends Controller
{
    public function index(Request $request) {

        if($request->ajax()) {

            $model = Speaking::select('id', 'std_id', 'created_at', 'th_sent_date', DB::raw("CONCAT('Part ', part, '-', IF(topic < 10, CONCAT('0', topic), topic)) as part_topic"))->with(['student'])
                ->where('th_id', auth()->user()->id)
                ->where('status', 'success');

            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->editColumn('student', function (Speaking $speaking) {
                    return $speaking->student->std_name;
                })
                ->editColumn('created_at', function (Speaking $speaking) {
                    return '<span class="badge badge-dark">'.$speaking->created_at->format('d-M-Y H:i:s').'</span>';
                })
                ->editColumn('th_sent_date', function (Speaking $speaking) {
                    return '<span class="badge badge-primary">'.$speaking->th_sent_date->format('d-M-Y H:i:s').'</span>';
                })
                ->editColumn('view', function (Speaking $speaking) {
                    $route = route('completed.view', ['id' => $speaking->id]);
                    return "<a href='$route' type='button' class='btn btn-success btn-sm'>View</a>";
                })
                ->rawColumns(['created_at', 'th_sent_date', 'view'])
                ->filterColumn('part_topic', function($query, $keyword) {
                    $sql = "CONCAT('Part ', part, '-', topic)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->make(true);
        }

        return view('admin.completed');
    }

    public function view($id) {

        $speakings = Speaking::with('sound', 'student')->where('id', $id)->first();

        if($speakings->part == 1) {
            $questions = PartOne::question($speakings->topic);
        } else if($speakings->part == 3) {
            $questions = PartOne::question($speakings->topic);
        } else {
            $questions = '';
        }

        return view('admin.completed_view', compact('speakings', 'questions'));
    }
}
