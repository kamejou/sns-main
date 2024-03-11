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
        'post.required' => ':attribute は必須です。',
        'post.string' => ':attribute は文字列である必要があります。',
        'post.min' => ':attribute は:min文字以上である必要があります。',
        'post.max' => ':attribute は:max文字以内である必要があります。',
    ]);
        $post = $request->input('content');
        $user_id = Auth::id();
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
            'post.required' => ':attribute は必須です。',
            'post.string' => ':attribute は文字列である必要があります。',
            'post.min' => ':attribute は:min文字以上である必要があります。',
            'post.max' => ':attribute は:max文字以内である必要があります。',
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
