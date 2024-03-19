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
        $userData = Auth::user();

$rules = [
    'username' => 'required|string|min:2|max:100',
    'mail' => 'required|string|email|min:5|max:40|unique:users,mail,' . Auth::user()->id,
    'password' => 'nullable|string|min:1|max:20|confirmed',
    'bio' => 'nullable|max:150',
];

if ($request->hasFile('images')) {
    $rules['images'] = 'nullable|image|mimes:jpg,jpeg,png|max:2048';
}

$request->validate($rules, [
    'username.required' => 'ユーザー名は必須です。',
    'username.string' => 'ユーザー名は文字列である必要があります。',
    'username.min' => 'ユーザー名は:min文字以上である必要があります。',
    'username.max' => 'ユーザー名は:max文字以内である必要があります。',
    'mail.required' => 'メールアドレスは必須です。',
    'mail.string' => 'メールアドレスは文字列である必要があります。',
    'mail.email' => '有効なメールアドレスを使用してください。',
    'mail.min' => 'メールアドレスは:min文字以上である必要があります。',
    'mail.max' => 'メールアドレスは:max文字以内である必要があります。',
    'mail.unique' => '既に存在するメールアドレスです。',
    'password.required' => 'パスワードは必須です。',
    'password.string' => 'パスワードは文字列である必要があります。',
    'password.min' => 'パスワードは:min文字以上である必要があります。',
    'password.max' => 'パスワードは:max文字以内である必要があります。',
    'password.confirmed' => 'パスワードが一致していません。',
    'bio.max' => '自己紹介は150文字以内で入力してください。',
    'images.image' => '画像ファイルを選択してください。',
    'images.mimes' => '画像ファイルはjpg、jpeg、png形式のみアップロードできます。',
    'images.max' => '画像ファイルのサイズは2MB以下にしてください。',
]);
        // バリデーションを実行
        //自己紹介文
// ddd($request->input('bio'));
        // リクエストデータから必要な情報を取得
        if ($request->filled('username', 'mail', 'bio')) {
            $userData= [
                'username' => $request->input('username'),
                'mail' => $request->input('mail'),
                'bio' => $request->input('bio')

            ];
        }
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
        if ($user !== $userData){
            $user -> update($userData);
        }
        //ページ移動
        return redirect('/top')->with('success', 'ユーザー情報が更新されました。');
    }



}
