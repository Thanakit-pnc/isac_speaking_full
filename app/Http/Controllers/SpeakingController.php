<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Sound;
use App\Models\Speaking;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class SpeakingController extends Controller
{
    public function part($part, $topic) {

        $partNum = $this->formatUrl($part);
        $topicNum = $this->formatUrl($topic);

        $topic = $topicNum < 10 ? '0'.$topicNum : $topicNum;

        $sounds['files'] = File::files("public/assets/sounds/part{$partNum}/{$topic}");
        $sounds['topic_name'] = Topic::topicName($topicNum);
        $sounds['introduction'] = "public/assets/sounds/part{$partNum}/introduction.mp3";
        
        return view('part1-3.index', [
            'partNum' => $partNum,
            'topicNum' => $topicNum,
            'sounds' => $sounds
        ]);
    }

    public function store(Request $request) {

        $sounds = $request->file('audio_data');

        $folder = auth('student')->user()->std_id.'/part'.$request->part.'/'.$request->topic.date('_dmYHis');

        $sound_arr = [];

        $store_record = DB::transaction(function () use($request, $folder, $sounds, $sound_arr) {

            $speaking = $request->user()->speaking()->create([
                'part' => $request->part,
                'topic' => $request->topic,
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

        return view('part1-3.submit', compact('speaking'));
    }

    public function store_submit(Request $request) {

        $request->user()->speaking()->update([
            'expected_score' => $request->expected_score,
            'current_course' => $request->current_course,
        ]);

        return redirect()->route('home.student');
    }

}
