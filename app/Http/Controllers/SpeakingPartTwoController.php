<?php

namespace App\Http\Controllers;

use File;
use App\Models\Sound;
use Illuminate\Http\Request;

class SpeakingPartTwoController extends Controller
{
    public function intro($topic) {

        $imgName = $topic < 10 ? '0'.$topic : $topic;

        $images = 'public/assets/topics/Topic'.$imgName.'.jpg';
        $sound_intro = 'public/assets/sounds/part2/audio_01.m4a';

        $data = [
            'topic' => $topic,
            'images' => $images,
            'sound_intro' => $sound_intro
        ];

        return view('part2.intro', compact('data'));
    }

    public function record($topic) {

        $imgName = $topic < 10 ? '0'.$topic : $topic;

        $images = 'public/assets/topics/Topic'.$imgName.'.jpg';
        $sound_record = 'public/assets/sounds/part2/audio_02.m4a';

        $data = [
            'topic' => $topic,
            'images' => $images,
            'sound_record' => $sound_record
        ];

        return view('part2.record', compact('data'));

    }

    public function store(Request $request) {

        $sound = $request->file('audio_data');
        $fileName = $sound->getClientOriginalName().'_'.date('dmYHis').'.mp3';
        $folder = auth('student')->user()->std_id.'/part2/';
        // $sound->storeAs($folder, $fileName, 'files');

        dd($fileName, $folder);

        $store_record = DB::transaction(function() use($request, $folder, $fileName) {
            $speaking = $request->user()->speaking()->create([
                'part' => 2,
                'topic' => $request->topic,
                'status' => 'sent',
                'due_date' => Carbon::now()->addDays(7)
            ]);

            Sound::create([
                'speaking_id' => $speaking->id,
                'path' => $folder.'/'.$fileName,
                'created_at' => Carbon::now()
            ]);
        });

        return response()->json(['msg' => 'Upload Success']);
    }
}
