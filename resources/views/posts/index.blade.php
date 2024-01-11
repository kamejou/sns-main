@extends('layouts.login')

@section('content')
<style>

  </style>
<form action="/posts/create" method="POST">
   @csrf
  <textarea name="content" placeholder="内容の入力"></textarea>
  <div class="pull-right">
    <button class="btn btn-success">
      <img src="{{ asset('images/post.png') }}" alt="投稿する"  class="example1">
    </button>
  </div>
</form>
 <h2>投稿一覧</h2>
 <hr class="line">
  @foreach ($list as $value)
<tr>
  <td><img src="{{ asset('images/icon1.png') }}"></td>
  <td>{{ $value->username }}</td>
  <td>{{ $value->post }}</td>
  <!-- ↓ログインしているユーザーのみ下記表示 -->
  @if (Auth::user()->id == $value->user_id)
  <!-- ↓編集ボタンをクリックしたときのモーダル -->
  <td>
    <div class="content">
        <!-- 投稿の編集ボタン -->
        <a class="js-modal-open" href="" post="{{ $value->post }}" post_id="{{ $value->id }}"><img src="{{ asset('images/edit.png') }}" alt="編集" class="example1"></a>
    </div>
    </div>
  </div>
</div>


  </td>

  {{ csrf_field() }}

  <td><a class="btn" href="/post/{{$value->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="{{ asset('images/trash-h.png') }}" alt="削除" class="example1"></a></td>

  @endif

  <td>{{ $value->created_at }}</td>
  <hr>

        <script src="main.js"></script>


</tr>
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
<script>
    function submitForm() {
        // フォームを送信
        document.getElementById('updateForm').submit();
    }
</script>
@endsection
