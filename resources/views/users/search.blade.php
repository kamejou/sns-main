@extends('layouts.login')
@section('content')
<form method="GET" >
    <input type="search" placeholder="ユーザー名を入力" name="search" value="">
    <div>
        <button type="submit"><a href="/search">検索</a></button>
    </div>
</form>
@endsection
