<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $table = 'communities';

    public function instance() {
      return $this->belongsTo('App\Instance');
    }

    public function posts() {
      return $this->hasMany('App\Post');
    }
}
