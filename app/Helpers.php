<?php
namespace App\Helpers;

use carbon\carbon;

class Helpers{
    public static function parseDate($date){
        return carbon::parse($date)->diffForHumans();
    }
}

