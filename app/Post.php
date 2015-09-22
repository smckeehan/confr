<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public function community() {
    return $this->belongsTo('App\Community');
  }

  public function comments() {
    return $this->hasMany('App\Comment');
  }

  public function user() {
    return $this->belongsTo('App\User');
  }
}
