<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $list= Post::get();
        // dd($list);<-変数のデータ閲覧
        return view('posts.index',['list'=>$list]);
    }

    public function create(Request $request)
    {
        $post = $request->input('content');
        $userId = Auth::id();
         Post::create([
            'post' => $post,
            'user_id' => $userId
        ]);
        $list= Post::get();
        // dd($list);<-変数のデータ閲覧

        return view('posts.index',['list'=>$list]);
        return view('/posts/index');
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();

        $list= Post::get();
        // dd($list);<-変数のデータ閲覧

        return view('posts.index',['list'=>$list]);
        return redirect('index');
    }
}
