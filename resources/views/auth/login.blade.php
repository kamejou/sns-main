@extends('layouts.logout')

@section('content')


<div id="usu_box">
  <div id="from_box">
    <p class="white h3">AtlasSNSへようこそ</p>
    <form action="/login" method="get">
      <label for="mail" class="white">mail adress</label>
      <input type="text" name="mail" id="mail" class="input">

      <label for="password" class="white">password</label>
      <input type="password" name="password" id="password" class="input">

      <button type="submit" class="white button_red button">LOGIN</button>

      <form name="Login" method="post" action="/cgi-bin/Login.cgi"></form>
    </form>

    <p class="url"><a href="/register" class="white">新規ユーザーの方はこちら</a></p>

  </div>
</div>
@endsection
