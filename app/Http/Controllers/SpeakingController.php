<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class SpeakingController extends Controller
{
    public function full_test($test) {
        return view('speaking.full-test', ['test' => $test]);
    }

    public function store(Request $request) {

        $sounds = $request->file('audio_data');
        
        $check_round = DB::table('speaking_full')
        ->select('round')
        ->latest()
        ->first();
        
        if($check_round) {
            $round = $check_round->round + 1;
        } else {
            $round = 1;
        }
        
        $folderName = auth('student')->user()->std_id.'/part'.$request->part.'/round'.$round;

        // foreach($sounds as $sound) {
        //     $fileName = $sound->getClientOriginalName().'.mp3';
        //     $sound->storeAs(
        //             $folderName, $fileName, 'files'
        //     );
        // }
            
        DB::transaction(function () use($request, $folderName, $round) {

            Speaking()->create([
                'std_id' => auth('student')->user()->std_id,
                'round' => $round,
                'part' => '1',
                'topic' => 'topic 1',
                
            ]);
            // DB::table('speaking_full')
            //     ->insert([
            //         'std_id' => auth('student')->user()->std_id,
            //         'round' => $round,
            //         'part_number' => $request->part,
            //         'part_path' => $folderName,
            //     ]);
        });

        return response()->json(['msg' => 'Upload Success']);
    }
}
