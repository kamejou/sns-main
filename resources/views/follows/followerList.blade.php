@extends('layouts.login')

@section('content')
<!-- br区切り線までのブロック -->
<div>
  <h1>Follower List</h1>
  <!-- 大まかにフォローアイコンを囲う -->
  <div>
    <!-- フォロワーアイコン微調整 -->
@foreach($users as $user)
@foreach($user->posts as $post)
      @if(Auth::user() == Auth::user()->isFollowed($user->id))
        <td><a class="btn" href="/others/{{$user->id}}"><img src="{{ asset('images/' . $user->images) }}"></a></td>
      @endif
@endforeach
@endforeach
    <div>
    </div>
  </div>
</div>
<hr class="line">

<br>

<div>
  <div>
@foreach($users as $user)
@foreach($user->posts as $post)
      @if(Auth::user() == Auth::user()->isFollowed($user->id))
      <tr>
        <td><a class="btn" href="/others/{{$user->id}}"><img src="{{ asset('images/' . $user->images) }}"></a></td>
        <td>{{ $user -> username }}</td>
        <td>{{ $post -> post }}</td>
        <td>{{ $post -> created_at }}</td>
      </tr>
      <hr>
      @endif
@endforeach
@endforeach
  </div>
</div>



@endsection
