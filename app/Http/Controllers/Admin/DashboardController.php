<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;

class DashboardController extends Controller
{
    public function index() {

        $data = DB::table('speaking_full')
            ->select('speaking_full.*', 'student.std_name')
            ->join('student', 'student.std_id', '=', 'speaking_full.std_id')
            ->first();

        $sounds = File::allFiles('public/files/'.$data->part_path);

        return view('admin.dashboard', compact('sounds'));
    }
}
