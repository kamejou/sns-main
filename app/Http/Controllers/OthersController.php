<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class OthersController extends Controller
{
    public function others($id){
        $other = User::find($id);

        $users = User::with('posts')->get();// 連結

        return view('follows.others',compact('users','other'));
    }
}
