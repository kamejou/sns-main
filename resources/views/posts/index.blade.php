@extends('layouts.login')

@section('content')
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
  <td>{{ $value->user_id }}</td>
  <!-- ↑user_idとusernameを連結する。 -->
  <td>{{ $value->post }}</td>
  <td><a href="/post/{{$value->id}}/update-form"><img src="{{ asset('images/edit.png') }}" alt="編集" class="example1"></a></td>

  <td>
    <div id="edit" v-if="showmodal" @click="back(edit_message)">
      <div id="i" @click.stop>
        <div class="bg-primary rounded py-2 px-3 mb-2">
          <input type="text" v-model="edit_message.text">
          <button type="button" class="btn btn-primary btn-sm" @click="message_update(edit_message)">編集</button>
        </div>
      </div>
    </div>
  </td>

  <td><a class="btn btn-danger" href="/post/{{$value->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="{{ asset('images/trash.png') }}" alt="削除" class="example1"></a></td>

  <hr>
</tr>
@endforeach
@endsection
