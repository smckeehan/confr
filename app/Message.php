<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function sender() {
      return $this->belongsTo('App\User', 'sender_id');
    }

    public function receiver() {
      return $this->belongsTo('App\User', 'receiver_id');
    }

    public function timeString() {
      return $this->format_interval(time() - $this->created_at->timestamp);
    }

    function format_interval($interval) {
      $outputStr = '0 sec';

      if($interval < 60) {
        $outputStr = 'a moment';
      } else if($interval < 60*60) {
        $outputStr = intval($interval/60).' mins';
      } else if($interval < 60*60*24) {
        $outputStr = intval($interval/60/60).' hours';
      } else if($interval < 60*60*24*30) {
        $outputStr = intval($interval/60/60/24).' days';
      } else if($interval < 60*60*24*365) {
        $outputStr = intval($interval/60/60/24/30).' months';
      } else {
        $outputStr = intval($interval/60/60/24/365).' years';
      }

      return $outputStr;
    }
}
