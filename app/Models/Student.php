<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Student extends Authenticatable
{
    use Notifiable;

    protected $table = 'student';
    protected $primaryKey = 'std_id';
    protected $rememberTokenName = false;
    

    public function speaking() {
        return $this->hasMany('App\Models\Speaking', 'std_id', 'std_id');
    }

    public static function showPoint() {

        $query = self::where('std_id', auth('student')->id());

        if(auth('student')->user()->coursetype == 'online') {
            $point = $query->select(DB::raw("SUM(std_pointsac + std_pointspeaking) as point"));
        } else {
            $point = $query->select('std_pointspeaking as point');
        }

        return $point->first();
    }

    public static function decrementPoint() {

        $query = self::where('std_id', auth('student')->id());

        if(auth('student')->user()->coursetype == 'online') {
       
            $point = $query->select(DB::raw('CASE WHEN std_pointsac != 0 THEN "std_pointsac" WHEN std_pointspeaking != 0 THEN "std_pointspeaking" ELSE "nopoint" END AS points'))->first();

            if($point->points != "nopoint") {
                $query->decrement($point->points);
            } else {
                session()->flash('msg', 'You have no points.');
                return redirect('home');
            }

        } else {
            if(auth('student')->user()->std_pointspeaking != 0) {
                $query->decrement('std_pointspeaking');
            } else {
                session()->flash('msg', 'You have no points.');
                return redirect('home');
            }
        }

    } 
}
