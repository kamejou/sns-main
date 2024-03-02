@extends('layouts.login')
@section('content')
<div>
  <div class="whole top">
    <div class="more_left">
      <img src="{{ asset('images/' . $other->images) }}" class="example1">
    </div>
    <div class="right">
      <div class="black"><p>name</p></div>
      <div class="breadth"><p>dio</p></div>
    </div>
    <div class="left_other">
      <div class="black">{{ $other -> username }}</div>
      <div class="top_other">{{ $other -> bio }}</div>
    </div>
    <div class="right_other">
    @if (auth()->user()->isFollowing($other->id))
      <form action="{{ route('unfollow', ['id' => $other->id]) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <button type="submit" class="btn btn-danger">フォロー解除</button>
      </form>
    @else
      <form action="{{ route('follow', ['id' => $other->id]) }}" method="POST">
          {{ csrf_field() }}

          <button type="submit" class="btn btn-primary">フォローする</button>
      </form>
    @endif
    </div>
  </div>
<hr class="line">
</div>
<div>
  <div>
@foreach($users as $user)
@foreach($user->posts as $post)
  @if($user->id == $other->id)
    <div class="whole">
      <div class="more_left"><img src="{{ asset('images/' . $user->images) }}" class="example1"></div>
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
  </div>
</div>
@endsection
