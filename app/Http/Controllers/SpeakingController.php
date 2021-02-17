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

        DB::transaction(function () use($request, $folder, $sounds) {

            $speaking = Speaking::create([
                'std_id' => auth('student')->user()->std_id,
                'part' => $request->part,
                'topic' => $request->topic,
                'status' => 'sent',
                'due_date' => Carbon::now()->addDays(7)
            ]);

            foreach($sounds as $sound) {
                $fileName = $sound->getClientOriginalName().'.mp3';
                $sound->storeAs($folder, $fileName, 'files');
                Sound::create([
                    'speaking_id' => $speaking->id,
                    'path' => $folder.'/'.$fileName,
                    'created_at' => Carbon::now()
                ]);
            }
            
        });

        return response()->json(['msg' => 'Upload Success']);
    }

    public function formatUrl($string) {
                
        preg_match_all('!\d+!', $string, $number);
     
        return $number[0][0];
    }

}
