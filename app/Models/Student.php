<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $table = 'student';
    protected $primaryKey = 'std_id';
    protected $rememberTokenName = false;
    

    public function speaking() {
        return $this->hasMany('App\Models\Speaking', 'std_id', 'std_id');
    }

}
