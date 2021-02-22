<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class SpeakingPartTwoController extends Controller
{
    public function intro($topic) {

        $topic = $topic < 10 ? '0'.$topic : $topic;

        $images = 'public/assets/topics/Topic'.$topic.'.jpg';
        $sound_intro = 'public/assets/sounds/part2/audio_01.m4a';

        $data = [
            'topic' => $topic,
            'images' => $images,
            'sound_intro' => $sound_intro
        ];

        return view('part2.intro', compact('data'));
    }

    public function record($topic) {

        $topic = $topic < 10 ? '0'.$topic : $topic;

        $images = 'public/assets/topics/Topic'.$topic.'.jpg';
        $sound_record = 'public/assets/sounds/part2/audio_02.m4a';

        $data = [
            'topic' => $topic,
            'images' => $images,
            'sound_record' => $sound_record
        ];

        return view('part2.record', compact('data'));

    }
}
