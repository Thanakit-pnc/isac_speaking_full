<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaking extends Model
{
    protected $table = 'speaking_full';

    public function student() {
        return $this->hasOne('App\Student');
    }
}
