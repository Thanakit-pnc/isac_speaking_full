<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public static function topicName($topicNum) {

        switch($topicNum) {
            case "1":
                $topic = 'City Life';
                break;
            case "2":
                $topic = 'Crime and punishment';
                break;
            case "3":
                $topic = 'Environment';
                break;
            case "4":
                $topic = 'Food';
                break;
            case "5":
                $topic = 'Shopping';
                break;
            case "6":
                $topic = 'City Life';
                break;
            case "7":
                $topic = 'City Life';
                break;
            case "8":
                $topic = 'City Life';
                break;
            case "9":
                $topic = 'City Life';
                break;
            case "10":
                $topic = 'City Life';
                break;
        }

        return $topic;
    }
}
