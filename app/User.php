<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens,  Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password','bio',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


 // フォロワー→フォロー
    public function followUsers()
    {
        return $this->belongsToMany('App\User', 'Follows', 'followed_id', 'following_id')
        ->select(['users.id as user_id', 'Follows.following_id', 'Follows.followed_id']);
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\User', 'Follows', 'following_id', 'followed_id')
        ->select(['users.id as user_id', 'Follows.following_id', 'Follows.followed_id']);
    }

    // フォローする
    public function follow(Int $id)
    {
        return $this->follows()->attach($id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $id)
    {
        return (boolean) $this->follows()->where('followed_id', $id)->first(['id']);
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['id']);
    }


//*****************************************


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
  /*
   *フォローされているユーザーを取得
   */
    // public function followUsers()
    // {
    //     return $this->belongsToMany(
    //         'App\Models\User',
    //         'follow_users',
    //         'followed_user_id',
    //         'following_user_id'
    //     );
    // }
  /*
   *フォローしているユーザーを取得
   */

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(product::class);
    }


}
