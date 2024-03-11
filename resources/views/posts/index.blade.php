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
<form action="/posts/create" method="POST">
   @csrf
  <div class="post_icon">
    <div class="">
      <img src="{{ asset('images/' . Auth::user()->images) }}" class="example1">
    </div>
    <div class="post_item">
      <textarea name="content" placeholder="投稿内容を入力してください。" class="abyss"></textarea>
    </div>
    <div class="post_item post_btn"><!-- " -->
      <button class="btn btn-success">
        <img src="{{ asset('images/post.png') }}" alt="投稿する"  class="img_p">
      </button>
    </div>
  </div>
</form>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 <hr class="line">
@foreach($sortedPosts as $post)
<div class="whole">
  <div class="more_left"><img src="{{ asset('images/' . $post->user->images) }}" class="example1"></div>
  <div class="left">
    <div class="black">{{ $post->user->username }}</div>
    <div class="breadth">{{ $post->post }}</div>
  </div>
  <div class="right">
    <div class="right_top">{{ substr($post->created_at , 0, 16)}}</div>
  <!-- ↓ログインしているユーザーのみ下記表示 -->
  @if (Auth::user()->id == $post->user->id)
  <!-- ↓編集ボタンをクリックしたときのモーダル -->
  <div class="right top">
    <div class="item-list">
      <div class="item">
        <!-- 投稿の編集ボタン -->
        <div class="btn js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">
          <img src="{{ asset('images/edit.png') }}" alt="編集" class="img_ed">
        </div>
      </div>
      <div class="item">
        <a class="btn box" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
          <img src="{{ asset('images/trash.png') }}" alt="削除" class="img_tr">
          <img src="{{ asset('images/trash-h.png') }}" alt="削除" class="img_de">
        </a>
      </div>
    </div>
  </div>

    @endif</div>
</div>
<hr class="line2">
@endforeach
<!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="modal-update" method="POST">
                <textarea name="post" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="post_id">
                <button type="submit">
                  <img src="{{ asset('images/edit.png') }}" alt="更新">
                </button>
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
<!-- <script>
    function submitForm() {
        // フォームを送信
        document.getElementById('updateForm').submit();
    }
</script> -->

@endsection
