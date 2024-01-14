@extends('layouts.login')

@section('content')
<!-- br区切り線までのブロック -->
<div>
  <h1>Follow List</h1>
  <!-- 大まかにフォローアイコンを囲う -->
  <div>
    <!-- フォロワーアイコン微調整 -->
@foreach($users as $user)
@foreach($user->posts as $post)
      @if(Auth::user() == Auth::user()->isFollowing($user->id))
        <td><a class="btn" href="/others/{{$user->id}}"><img src="{{ asset('images/icon1.png') }}"></a></td>
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
      @if(Auth::user() == Auth::user()->isFollowing($user->id))
      <tr>
        <td><a class="btn" href="/others/{{$user->id}}"><img src="{{ asset('images/icon1.png') }}"></a></td>
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
<hr>



@endsection
