<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
}

class FollowUser extends Pivot
{
    protected $fillable = ['following_id', 'followed_id'];

    protected $table = 'follows';

}
