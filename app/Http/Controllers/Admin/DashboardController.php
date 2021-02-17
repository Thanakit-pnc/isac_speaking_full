<?php

namespace App\Http\Controllers\Admin;

use App\Models\Speaking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index() {

        $speakings = Speaking::with('student')->where('status', 'sent')->get();

        return view('admin.dashboard', compact('speakings'));
    }

    public function update(Request $request) {

        $alreadySelect = Speaking::where('id', $request->id)->first();

        if(!is_null($alreadySelect->th_id)) {
            return back()->with('msg', 'Sorry, another teacher has already selected this work. <span class="font-weight-bold">Please reload this page again.</span>');
        }
        
        Speaking::where('id', $request->id)
            ->update([
                'status' => 'pending',
                'th_id' => auth()->user()->id
            ]);
        
        return redirect()->route('pending');
    }
}
