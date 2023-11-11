@extends('layouts.login')

@section('content')
プロフィール表示できてるよ
{!! Form::open(['url' => '/update/top','method' => 'POST']) !!}


{{ Form::label('username', 'ユーザー名')}}
{{ Form::text('username', Auth::user()-> username, ['class' => 'input']) }}

{{ Form::label('email', 'メールアドレス') }}
{{ Form::email('mail', Auth::user()-> mail, ['class' => 'input']) }}

{{ Form::label('password', 'パスワード') }}
{{ Form::password('password', ['class' => 'input']) }}

{{ Form::label('password_confirm', 'パスワード確認') }}
{{ Form::password('password_confirmation', ['class' => 'input']) }}

{{ Form::label('bio', '自己紹介文') }}
{{ Form::textarea('bio', optional(Auth::user())->bio, ['class' => 'input']) }}


{{ Form::submit('更新') }}
{!! Form::close() !!}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
