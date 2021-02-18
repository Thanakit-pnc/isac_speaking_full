<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaking extends Model
{
    protected $table = 'speakings';

    protected $guarded = [];

    protected $dates = [
        'due_date', 'th_sent_date'
    ];

    public function student() {
        return $this->hasOne('App\Models\Student', 'std_id', 'std_id');
    }

    public function user() {
        return $this->hasOne('App\User', 'id', 'th_id');
    }

    public function sound() {
        return $this->hasMany('App\Models\Sound');
    }
}
