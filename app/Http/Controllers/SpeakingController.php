<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpeakingController extends Controller
{
    public function full_test($test) {
        return view('speaking.full-test', ['test' => $test]);
    }
}
