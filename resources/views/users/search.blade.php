@extends('layouts.login')
@section('content')
<form action="/search" method="GET" >
    <input type="text" name="username" placeholder="ユーザー名を入力" name="search" value="">
    <div>
        <button type="submit">検索</a></button>
    </div>
</form>
@if(isset($search))
    <h2>検索結果: "{{ $search }}"</h2>
@endif
<br>

  @foreach ($users as $user)
<tr>
  <td><img src="{{ asset('images/icon1.png') }}"></td>
  <td>{{ $user->username }}</td>
  <hr>
</tr>
@endforeach
@endsection
