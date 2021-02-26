<?php

namespace App\Http\Controllers;

use DB;
use File;
use Carbon\Carbon;
use App\Models\Sound;
use App\Models\Set;
use App\Models\Student;
use App\Models\Speaking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpeakingController extends Controller
{
    public function part($part, $topic) {

        $partNum = $this->formatUrl($part);
        $setNum = $this->formatUrl($topic);

        $topic = $setNum < 10 ? '0'.$setNum : $setNum;

        $sounds['files'] = File::files("public/assets/sounds/part{$partNum}/{$topic}");
        $sounds['set_name'] = Set::setName($setNum);
        $sounds['introduction'] = "public/assets/sounds/part{$partNum}/introduction.mp3";

        if($partNum == 1) {
            $time = 20;
        } else {
            $time = 40;
        }
        
        return view('part1-3.index', [
            'partNum' => $partNum,
            'setNum' => $setNum,
            'sounds' => $sounds,
            'time' => $time
        ]);
    }

    public function store(Request $request) {

        dd($request->all());

        $sounds = $request->file('audio_data');

        $folder = auth('student')->user()->std_id.'/part'.$request->part.'/'.$request->set.date('_dmYHis');

        $sound_arr = [];

        $store_record = DB::transaction(function () use($request, $folder, $sounds, $sound_arr) {

            $speaking = $request->user()->speaking()->create([
                'part' => $request->part,
                'topic' => $request->set,
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

            Student::decrementPoint();

            return response()->json(['msg' => 'Upload Success', 'url' => route('index.submit', ['id' => $speaking->id])]);
        });
        
        return $store_record;
    }

    public function formatUrl($string) {
                
        preg_match_all('!\d+!', $string, $number);
     
        return $number[0][0];
    }

}
