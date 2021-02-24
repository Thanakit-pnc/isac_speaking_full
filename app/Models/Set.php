<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    public static function setName($setNum) {

        switch($setNum) {
            case "1":
                $set = 'City Life';
                break;
            case "2":
                $set = 'Crime and punishment';
                break;
            case "3":
                $set = 'Environment';
                break;
            case "4":
                $set = 'Food';
                break;
            case "5":
                $set = 'Shopping';
                break;
            case "6":
                $set = 'Sports and leisure';
                break;
            case "7":
                $set = 'Technology';
                break;
            case "8":
                $set = 'Tourism';
                break;
            case "9":
                $set = 'Work';
                break;
            case "10":
                $set = 'City Life';
                break;
        }

        return $set;
    }
}
