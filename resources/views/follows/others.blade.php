@extends('layouts.login')
@section('content')
<div>
  <div>
    <div><p>name</p>{{ $user -> username }}</div>
    <div><p>dio</p>{{ $user -> bio }}</div>
  </div>
  <div class="d-flex justify-content-end flex-grow-1">
@if (auth()->user()->isFollowing($user->id))

        <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
    @else
        <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
            {{ csrf_field() }}

            <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
    @endif
    </div>
<hr class="line">
</div>
<div>
  <div>
    @foreach ($posts as $value)
    <tr>
      <td><img src="{{ asset('images/icon1.png') }}"></td>
      <td>{{ $value -> post }}</td>
      <td>{{ $user -> username }}</td>
      <td>{{ $value -> created_at }}</td>
    </tr>
    @endforeach
  </div>
</div>
@endsection
