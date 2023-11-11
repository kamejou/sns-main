<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index(Request $requests)
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


    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();

        $list= Post::get();
        // dd($list);<-変数のデータ閲覧

        return view('posts.index',['list'=>$list]);

    }

    public function update(Request $request)
   {
       $message = Message::findOrFail($request->id);
       $user = Auth::user();
       $message->text = $request->text;
       if($request->user_id === $user->id) {
           $message->update();
           event(new MessageCreated($message));
           return $message;
       } else {
           return false;
       }
   }

   public function home(){
    return redirect('/logout');
   }
}
