<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use App\Instance;
use Auth;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'instance_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function instance() {
      return $this->belongsTo('App\Instance');
    }

    public function posts() {
      return $this->hasMany('App\Post');
    }

    public function points() {
      $totalPoints = 0;
      $posts = $this->posts;

      foreach($posts as $post) {
        $totalPoints = $totalPoints + $post->points;
      }

      return $totalPoints;
    }

    public function receivedMessages() {
      return $this->hasMany('App\Message', 'receiver_id');
    }

    public function unreadMessages() {
      return $this->receivedMessages()->where('read', false)->get();
    }
}
