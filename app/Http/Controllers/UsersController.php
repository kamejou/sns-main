<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public function profile(Request $request){
        $user = User::all();
        return view('users.profile', compact('user'));
    }

    public function search(Request $request){

        $search = $request->input('username');
        $users = User::where('username','like','%'.$search.'%')->get();
        return view('users.search', compact('users', 'search'));
    }

    public function update(Request $request)
    {
        //ルール設定
        $rules = [
            'username' => 'required|string|min:2|max:10',
            'mail' => 'required|string|email|min:5|max:40|unique:users',
            'password' => 'required|string|min:8|max:20|confirmed',
        ];
        // バリデーションを実行
        $request->validate($rules);
        //ユーザー取得
        $user = Auth::user();
        // リクエストデータから必要な情報を取得
        $userDate = [
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
        ];
        // パスワードが入力されていればハッシュ化して保存
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->input('password'));
        }
        // ユーザー情報を更新
        $user -> update($userDate);
        //ページ移動
        return redirect('/top')->with('success', 'ユーザー情報が更新されました。');
    }

}
