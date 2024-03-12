<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Post;


class PostsController extends Controller
{
    public function index(Request $requests)
    {
    $users = User::with('posts')->get();// 連結
    return view('posts.index', compact('users'));
    }


    public function create(Request $request)
    {
        $request->validate([
            'post' => 'required|string|min:1|max:150',
        ], [
            'post.required' => '投稿内容を入力してください。',
            'post.string' => '投稿内容は文字列で入力してください。',
            'post.min' => '投稿内容は:min文字以上で入力してください。',
            'post.max' => '投稿内容は:max文字以内で入力してください。',
        ]);
        $post = $request->input('post');
        $user_id = Auth::id();
        if (!$user_id) {
            return redirect()->back()->with('error', 'ユーザー情報が取得できませんでした。');
        }

         Post::create([
            'post' => $post,
            'user_id' => $user_id
        ]);
        $users = User::with('posts')->get();// 連結

    return view('posts.index', compact('users'));


    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();

        $users = User::with('posts')->get();// 連結

    return view('posts.index', compact('users'));

    }

   public function home(){
    return redirect('/logout');
   }

   public function hello(){
    return redirect('views.welcome');
   }

    public function modalUpdate(Request $request){
        $request->validate([
            'post' => 'required|string|min:1|max:150',
        ], [
            'post.required' => '投稿内容の入力は必須です。',
            'post.string' => '投稿内容は文字列である必要があります。',
            'post.min' => '投稿内容は:min文字以上である必要があります。',
            'post.max' => '投稿内容は:max文字以内である必要があります。',
        ]);
        $id = $request->input('id');
        $post = Post::find($id);

        if ($post) {
            // モデルのプロパティを更新
            $post->post = $request->input('post');

            // モデルを保存
            $post->save();
        }

        return redirect('top');
    }
}
