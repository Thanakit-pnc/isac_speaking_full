<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\PartOne;
use App\Models\Speaking;
use App\Models\PartThree;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(Request $request) {

        if($request->ajax()) {
            $model = Speaking::with(['user'])
                ->where('std_id', auth('student')->user()->std_id);

            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->editColumn('part', function (Speaking $speaking) {

                    $route = route('status.details', ['id' => $speaking->id]);

                    $topic = $speaking->topic < 10 ? '0'.$speaking->topic : $speaking->topic;

                    if($speaking->status == 'success') {
                        $part = "<a href='$route' type='button' class='btn btn-outline-primary waves-effect waves-light btn-sm'>Part $speaking->part-$topic</a>";
                    } else {
                        $part = 'Part '.$speaking->part.'-'.$topic;
                    }

                    return $part;
                })
                ->editColumn('created_at', function (Speaking $speaking) {
                    return '<span class="badge badge-dark">'.$speaking->created_at->format('d-M-Y H:i:s').'</span>';
                })
                ->addColumn('user', function (Speaking $speaking) {
                    return $speaking->user !== null ? ucfirst($speaking->user->name) : '';
                })
                ->editColumn('status', function (Speaking $speaking) {
                    if($speaking->status == 'sent') {
                        $status = '<span class="badge badge-warning">Sent</span>';
                    } else if($speaking->status == 'pending') {
                        $status = '<span class="badge badge-purple">Pending</span>';
                    } else {
                        $status = '<span class="badge badge-success">Success</span>';
                    }

                    return $status;
                })
                ->rawColumns(['part', 'created_at', 'status'])
                ->make(true);
        }

        return view('student.status');
    }

    public function details($id) {

        $speakings = Speaking::with('sound', 'student')->where('id', $id)->first();

        if($speakings->part == 1) {
            $questions = PartOne::question($speakings->topic);
        } else if($speakings->part == 3) {
            $questions = PartThree::question($speakings->topic);
        } else {
            $questions = '';
        }

        return view('student.status_details', compact('speakings', 'questions'));
    }
}
