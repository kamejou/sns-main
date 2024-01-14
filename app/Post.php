<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
     protected $fillable = [
        'post',
        'user_id'
    ];
    public function getUserNameById()
  {

    return DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->get();
    // return $this->belognsTo('App\User');
  }

  public function user()
    {
        return $this->belongsTo(User::class);
    }

}
