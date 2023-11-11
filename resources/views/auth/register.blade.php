@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('username', 'ユーザー名')}}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('email', 'メールアドレス') }}
{{ Form::email('mail',null,['class' => 'input']) }}

{{ Form::label('password', 'パスワード') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::label('password_confirm', 'パスワード確認') }}
{{ Form::password('password_confirmation',['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
