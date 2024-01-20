<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Auth;
use App\FollowUser;

class FollowUsersController extends Controller
{
    public function follow($id)
{
    //相手のidを取得
    // dd($id);

    // $user->id が null または 0 でないことを確認
    if ($id) {
    $follower = auth()->user();
        // フォローしているか確認
        $is_following = $follower->isFollowing($id);

        if (!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($id);

            // return view('users.search');
            return back();
        }
    }
    // $user->id が null または 0 の場合の処理（エラー処理やリダイレクトなど）
}




// フォロー解除
public function unfollow($id)
{
    //ログインしているユーザー
    $follower = auth()->user();

    // $user->id が null または 0 でないことを確認
    if ($id) {
        // フォローしているか確認
        $is_following = $follower->isFollowing($id);

        if ($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($id);
            return back();
        }
    }
    // $user->id が null または 0 の場合の処理（エラー処理やリダイレクトなど）
}



}
