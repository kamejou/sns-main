@extends('layouts.login')

@section('content')
<!-- br区切り線までのブロック -->
<div>
  <h1>Follow List</h1>
  <!-- 大まかにフォローアイコンを囲う -->
  <div>
    <!-- フォロワーアイコン微調整 -->
      @foreach ($list as $value)
      @if(Auth::user() == Auth::user()->isFollowing($value->id))
        <td><a class="btn" href="/others/{{$value->id}}"><img src="{{ asset('images/icon1.png') }}"></a></td>
      @endif
      @endforeach
    <div>
    </div>
  </div>
</div>
<hr class="line">

<br>

<div>
  <div>
      @foreach ($list as $value)
      @if (Auth::user()->id == Auth::user()->isFollowing($value->id))
      <tr>
        <td><a class="btn" href="/others/{{$value->id}}"><img src="{{ asset('images/icon1.png') }}"></a></td>
        <td>{{ $value -> username }}</td>
        <td>{{ $value -> post }}</td>
        <td>{{ $value -> created_at }}</td>
      </tr>
      <hr>
      @endif
      @endforeach
  </div>
</div>
<hr>



@endsection
