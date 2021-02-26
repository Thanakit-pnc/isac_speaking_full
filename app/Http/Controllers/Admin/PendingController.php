<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\PartOne;
use App\Models\PartThree;
use App\Models\Speaking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendingController extends Controller
{
    public function index() {

        $pendings = Speaking::with('student')
            ->where([
                'status' => 'pending',
                'th_id' => auth()->user()->id
            ])
            ->get();

        return view('admin.pending', compact('pendings'));
    }

    public function check($id) {

        $speakings = Speaking::with(['sound' => function($query) {
            $query->orderBy('path', 'ASC');
        }, 'student'])->where('id', $id)->first();

        if($speakings->part == 1) {
            $questions = PartOne::question($speakings->topic);
        } else if($speakings->part == 3) {
            $questions = PartThree::question($speakings->topic);
        } else {
            $questions = '';
        }

        return view('admin.comment', compact('speakings', 'questions'));
    }

    public function store(Request $request) {

        $this->validate($request, [
            'score' => 'required',
            'fluency' => 'required',
            'lexical' => 'required',
            'grammatical' => 'required',
            'pronunciation' => 'required',
        ]);
        
        Speaking::where('id', $request->id)
            ->update([
                'status' => 'success',
                'score' => $request->score,
                'fluency_and_coherence' => $request->fluency,
                'lexical_resource' => $request->lexical,
                'grammar_range_and_acc' => $request->grammatical,
                'pronunciation' => $request->pronunciation,
                'th_sent_date' => Carbon::now(),
            ]);

        return redirect()->route('completed');
    }
}
