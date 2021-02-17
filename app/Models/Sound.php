<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function speaking() {
        return $this->belongsTo('App\Models\Speaking');
    }
}
