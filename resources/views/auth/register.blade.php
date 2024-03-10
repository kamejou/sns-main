@extends('layouts.logout')

@section('content')
<div id="usu_box">
  <div id="from_box">
    <form method="post" action="/register">
    <h2  class="white h3">新規ユーザー登録</h2>
    @csrf

        <label for="username" class="white">ユーザー名</label>
        <input type="text" name="username" class="input" value="">

        <label for="mail" class="white">メールアドレス</label>
        <input type="mail" name="mail" class="input" value="">


        <label for="password" class="white">パスワード</label>
        <input type="password" name="password" class="input">

        <label for="password_confirm" class="white">パスワード確認</label>
        <input type="password" name="password_confirmation" class="input">

        <button type="submit" class="white button_red button register">REGISTER</button>


    </form>
        <p class="url"><a href="/login" class="white">ログイン画面へ戻る</a></p>
  </div>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
