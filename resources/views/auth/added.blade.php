@extends('layouts.logout')

@section('content')
<div id="usu_box">
  <div id="from_box">
    <p class="white  h4">{{ $data['username'] }}さん</p>
    <p class="white  h5">ようこそ！AtlasSNSへ！</p>
    <p class="white right_p1">ユーザー登録が完了しました。</p>
    <p class="white right_p2">早速ログインをしてみましょう。</p>
    <button type="button" onclick="location.href='/login'" class="white button_red button1 register">ログイン画面へ</button>

  </div>
</div>

@endsection
