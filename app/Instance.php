<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    public function communities() {
      return $this->hasMany('App\Community');
    }

    public function users() {
      return $this->hasMany('App\User');
    }
}
