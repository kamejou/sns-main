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
        //ユーザー取得
        $user = Auth::user();
        $request->validate(
        //バリデーションメッセージ
        [
            'required' => ':attribute は必須です。',
            'string' => ':attribute は文字列である必要があります。',
            'min' => ':attribute は:min文字以上である必要があります。',
            'max' => ':attribute は:max文字以内である必要があります。',
            'email' => ':attribute は有効なメールアドレスである必要があります。',
            'unique' => ':attribute は既に存在します。',
            'confirmed' => 'パスワードが一致していません。',
            'bio' => ':attribute が書いていない'
        ],
        //ルール設定
        [
            'username' => 'required|string|min:1|max:100',
            'mail' => 'required|string|email|min:1|max:40|unique:users,mail,' . $user->id,
            'password' => 'nullable|sometimes|required|string|min:1|max:20|confirmed',
            'bio' => 'nullable|string',
            'images' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        // バリデーションを実行
        //自己紹介文
// ddd($request->input('bio'));
        // リクエストデータから必要な情報を取得
        $userData= [
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'bio' => $request->input('bio')

        ];
        //アイコン変更処理
        // if ($request->hasFile('images')) {
        //     $avatar = $request->input('images');
        //     $avatarPath = $avatar->store('images', 'public');
        //     $userData->avatar = $avatarPath;
        // }else{
        //     $userData['avatar'] = $user->avatar;
        // }
        // $icon = ['images' => $request->input('images')];
        // if($icon !== null){
        //     $userData = ['images' => $request->file('images')];
        // }
        // if(is_null($icon)) {
        //     $icon = Auth::user('images');
        //     $userData = ['images' => $request->file('images')];
        // }
        if ($request->filled('images')) {
            $avatar = $request->input('images');
            $userData['images'] = $avatar;
        }


        // パスワードが入力されていればハッシュ化して保存
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->input('password'));
        }
        // ユーザー情報を更新
        $user -> update($userData);
        //ページ移動
        return redirect('/top')->with('success', 'ユーザー情報が更新されました。');
    }



}
