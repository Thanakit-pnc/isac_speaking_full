<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Speaking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request) {

        if(isset($request->reset)) {
            $date_range = '';
        } else {
            if(isset($request->search_daterange)) {
                
                $explode_date = explode(' - ', $request->search_daterange);
    
                $start = date('Y-m-d 00:00:00', strtotime($explode_date[0]));
                $end = date('Y-m-d 23:59:59', strtotime($explode_date[1]));
    
                $date_range = [$start, $end];
            } else {
                $date_range = '';
            }
        }


        $reports = DB::table('users')
                ->select('users.id', 'users.name', DB::raw("SUM(CASE WHEN (speakings.status = 'pending') THEN 1 ELSE 0 END) as Pending, SUM(CASE WHEN (speakings.status = 'success') THEN 1 ELSE 0 END) as Success"))
                ->leftjoin('speakings', 'users.id', '=', 'speakings.th_id')
                ->whereIn('users.level', [1, 2])
                ->when($date_range, function($query) use($date_range) {
                    return $query->whereBetween('speakings.th_sent_date', $date_range);
                })
                ->groupBy('users.id')
                ->get();

        return view('admin.reports', compact('reports'));
    }
}
