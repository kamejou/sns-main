<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
}

class FollowUser extends Pivot
{
    protected $fillable = ['following_user_id', 'followed_user_id'];

    protected $table = 'follows';

}
