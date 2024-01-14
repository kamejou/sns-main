<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\FollowUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FollowsController extends Controller
{
    //
    public function followList(Request $request){

        $users = User::with('posts')->get();// 連結
        return view('follows.followList', compact('users'));
    }
    public function followerList(Request $request){

        $users = User::with('posts')->get();// 連結
        return view('follows.followerList', compact('users'));
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
