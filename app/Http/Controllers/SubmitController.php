<?php

namespace App\Http\Controllers;

use App\Models\Speaking;
use Illuminate\Http\Request;

class SubmitController extends Controller
{
    public function index($id) {

        $speaking = Speaking::find($id);
        $route = route('store.submit');

        switch($speaking->part) {
            case 1:
                $sound_ended = "public/assets/sounds/part1/ending.mp3";
                break;
            case 2:
                $sound_ended = "public/assets/sounds/part2/audio_03.m4a";
                break;
            case 3:
                $sound_ended = "public/assets/sounds/part3/ending.mp3";
                break;
            default:
                return 'Part is null';
        }

        return view('submit', compact('speaking', 'route', 'sound_ended'));
    }

    public function store(Request $request) {

        $request->user()->speaking()->update([
            'expected_score' => $request->expected_score,
            'current_course' => $request->current_course,
        ]);

        return redirect()->route('home.student');

    }
}
