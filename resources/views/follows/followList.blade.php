@extends('layouts.login')

@section('content')
<!-- br区切り線までのブロック -->
<div class="flex_follow margin_top">
  <h1 class="margin_left_follow">Follow List</h1>
  <!-- フォロワーアイコン微調整 -->
  <div class="icon_width clearfix">
    @foreach($users as $user)
    @foreach($user->posts as $post)
      @if(Auth::user() == Auth::user()->isFollowing($user->id))
        <a class="icon_one" href="/others/{{$user->id}}">
          <img src="{{ asset('images/' . $user->images) }}" class="example1">
        </a>
      @endif
    @endforeach
    @endforeach
  </div>
</div>
<hr class="line">


@foreach($users as $user)
@foreach($user->posts as $post)
  @if(Auth::user() == Auth::user()->isFollowing($user->id))
    <div  class="whole">
      <div class="more_left">
        <a class="btn" href="/others/{{$user->id}}">
          <img src="{{ asset('images/' . $user->images) }}" class="img_icon">
        </a>
      </div>
      <div class="left">
        <div class="black">{{ $user -> username }}</div>
        <div class="breadth">{{ $post -> post }}</div>
      </div>
      <div class="right">
        <div class="right_top">{{ substr($post->created_at , 0, 16)}}</div>
      </div>
    </div>
    <hr>
  @endif
@endforeach
@endforeach



@endsection
