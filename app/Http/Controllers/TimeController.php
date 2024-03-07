<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function convert($time)
    {
        $now = Carbon::now();
        $get_time = Carbon::parse($time);
        $seconds = $get_time->diffInSeconds($now);
        $minutes = $get_time->diffInMinutes($now);
        $hours = $get_time->diffInHours($now);
        $days = $get_time->diffInDays($now);
        
        if($seconds < 60) {
            return $seconds.' detik lalu';
        } elseif($seconds > 60 && $seconds < 3600) {
            return $minutes.' menit lalu';
        } elseif($seconds > 3600 && $seconds <= 86400) {
            return $hours.' jam lalu';
        } elseif($seconds > 86400) {
            return $days.' hari lalu';
        }
    }
}
