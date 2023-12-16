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

    public function follow(User $user) {
        $follow = FollowUser::create([
            'following_id' => \Auth::user()->id,
            'followed_id' => $user->id,
        ]);
        $followCount = count(FollowUser::where('followed_id', $user->id)->get());
        return response()->json(['followCount' => $followCount]);
    }

    public function unfollow(User $user) {
        $follow = FollowUser::where('following_id', \Auth::user()->id)->where('followed_id', $user->id)->first();
        $follow->delete();
        $followCount = count(FollowUser::where('followed_d', $user->id)->get());

        return response()->json(['followCount' => $followCount]);
    }
}
