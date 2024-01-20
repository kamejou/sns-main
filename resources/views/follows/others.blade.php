@extends('layouts.login')
@section('content')
<div>
  <div>
    <div><p>name</p>{{ $other -> username }}</div>
    <div><p>dio</p>{{ $other -> bio }}</div>
  </div>
  <div class="d-flex justify-content-end flex-grow-1">
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
<hr class="line">
</div>
<div>
  <div>
@foreach($users as $user)
@foreach($user->posts as $post)
    <tr>
      <td><img src="{{ asset('images/' . $user->images) }}"></td>
      <td>{{ $user -> username }}</td>
      <td>{{ $post -> post }}</td>
      <td>{{ $post -> created_at }}</td>
    </tr>
  <hr>
@endforeach
@endforeach
  </div>
</div>
@endsection
