<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Sound;
use App\Models\Speaking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpeakingController extends Controller
{
    public function part($part, $topic) {

        $partNum = $this->formatUrl($part);
        $topicNum = $this->formatUrl($topic);

        return view('part1.index', [
            'partNum' => $partNum,
            'topicNum' => $topicNum,
        ]);
    }

    public function store(Request $request) {

        $sounds = $request->file('audio_data');

        $folder = auth('student')->user()->std_id.'/part'.$request->part.'/'.$request->topic.date('_dmYHis');

        $sound_arr = [];

        $store_record = DB::transaction(function () use($request, $folder, $sounds, $sound_arr) {

            $speaking = $request->user()->speaking()->create([
                'part' => 1,
                'topic' => 2,
                'status' => 'sent',
                'due_date' => Carbon::now()->addDays(7)
            ]);

            foreach($sounds as $key => $sound) {
                $fileName = $sound->getClientOriginalName().'.mp3';
                $sound->storeAs($folder, $fileName, 'files');

                $sound_arr[] = [
                    'speaking_id' => $speaking->id,
                    'path' => $folder.'/'.$fileName,
                    'created_at' => Carbon::now()
                ];

            }

            Sound::insert($sound_arr);

            return response()->json(['msg' => 'Upload Success', 'url' => route('index.submit', ['id' => $speaking->id])]);
        });
        
        return $store_record;
    }

    public function formatUrl($string) {
                
        preg_match_all('!\d+!', $string, $number);
     
        return $number[0][0];
    }

    public function submit($id) {

        $speaking = Speaking::find($id);

        return view('part1.submit', compact('speaking'));
    }

    public function store_submit(Request $request) {

        $request->user()->speaking()->update([
            'expected_score' => $request->expected_score,
            'current_course' => $request->current_course,
        ]);

        return redirect()->route('home.student');
    }

}
