@extends('layouts.logout')

@section('content')
<div id="usu_box">
  <div id="from_box">
    <form method="POST" action="">
    <h2  class="white h3">新規ユーザー登録</h2>

        <label for="username" class="white">ユーザー名</label>
        <input type="text" name="username" class="input" value="">

        <label for="email" class="white">メールアドレス</label>
        <input type="email" name="email" class="input" value=""> {{-- 'mail' を 'email' に修正 --}}

        <label for="password" class="white">パスワード</label>
        <input type="password" name="password" class="input">

        <label for="password_confirm" class="white">パスワード確認</label>
        <input type="password" name="password_confirmation" class="input">

        <button type="submit" class="white button_red button register">REGISTER</button>

        <p class="url"><a href="/login"  class="white">ログイン画面へ戻る</a></p>

    </form>
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
