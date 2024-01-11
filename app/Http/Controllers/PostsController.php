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
        $list= Post::get();
        // dd($list);<-変数のデータ閲覧

        $this->posts = new Post();
        $list = $this->posts->getUserNameById();
        $list = Post::all();
        // 連結
        return view('posts.index',['list'=>$list]);
    }


    public function create(Request $request)
    {
        $post = $request->input('content');
        $user_id = Auth::id();
         Post::create([
            'post' => $post,
            'user_id' => $user_id
        ]);
        $list= Post::get();
        // dd($list);<-変数のデータ閲覧

        $this->posts = new Post();
        $list = $this->posts->getUserNameById();
        $list = Post::all();
        // 連結


        return view('posts.index',['list'=>$list]);


    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();

        $list= Post::get();
        // dd($list);<-変数のデータ閲覧

        $this->posts = new Post();
        $list = $this->posts->getUserNameById();
        $list = Post::all();
        // 連結

        return view('posts.index',['list'=>$list]);

    }

   public function home(){
    return redirect('/logout');
   }

   public function hello(){
    return redirect('views.welcome');
   }

   public function modalUpdate(Request $request){
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
