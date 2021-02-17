<?php

namespace App\Http\Controllers\Admin;

use App\Models\Speaking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompletedController extends Controller
{
    public function index() {

        $completes = Speaking::with('student')
        ->where([
            'status' => 'success',
            'th_id' => auth()->user()->id
        ])
        ->get();

        return view('admin.completed', compact('completes'));
    }

    public function view($id) {

        $speakings = Speaking::with('sound', 'student')->where('id', $id)->first();

        return view('admin.completed_view', compact('speakings'));
    }
}
