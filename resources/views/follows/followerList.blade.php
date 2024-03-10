@extends('layouts.login')

@section('content')
@php
    // ユーザーの全ての投稿を取得する
    $allPosts = collect();
    foreach($users as $user) {
        $allPosts = $allPosts->concat($user->posts);
    }

    // 投稿を作成日時の降順に並べ替える
    $sortedPosts = $allPosts->sortByDesc('created_at');
@endphp
<!-- br区切り線までのブロック -->
<div class="flex_follow margin_top">
  <h1 class="margin_left_follow">Follower List</h1>
  <!-- フォロワーアイコン微調整 -->
  <div class="icon_width clearfix">
@foreach($users as $user)
  @if(Auth::user() == Auth::user()->isFollowed($user->id))
    <a class="icon_one" href="/others/{{$user->id}}" class="">
      <img src="{{ asset('images/' . $user->images) }}" class="example1">
    </a>
  @endif
@endforeach
  </div>
</div>
<hr class="line">


@foreach($sortedPosts as $post)
    @if(Auth::user() == Auth::user()->isFollowed($post->user->id))
        <div class="whole">
            <div class="more_left">
                <a class="btn" href="/others/{{$post->user->id}}">
                    <img src="{{ asset('images/' . $post->user->images) }}" class="img_icon">
                </a>
            </div>
            <div class="left">
                <div class="black">{{ $post->user->username }}</div>
                <div class="breadth">{{ $post->post }}</div>
            </div>
            <div class="right">
                <div class="right_top">{{ substr($post->created_at , 0, 16)}}</div>
            </div>
        </div>
        <hr>
    @endif
@endforeach


@endsection
