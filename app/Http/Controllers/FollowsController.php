<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\FollowUser;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }



    //フォローする
    // public function follow(Request $request)
    // {
    //     FollowUser::firstOrCreate([
    //         'followed_id' => $request->post_user,
    //         'following_id' => $request->auth_user
    //     ]);
    //     return true;
    // }
    // //フォロー解除する
    // public function unfollow(Request $request)
    // {
    //     $follow = FollowUser::where('followed_id', $request->post_user)
    //         ->where('following_id', $request->auth_user)
    //         ->first();
    //     if ($follow) {
    //         $follow->delete();
    //         return false;
    //     }
    // }

}
