<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class OthersController extends Controller
{
    public function others($id){
        $user = User::find($id);

        $posts = $user->posts;

        return view('follows.others', ['user'=>$user, 'posts' => $posts]);
    }
}
