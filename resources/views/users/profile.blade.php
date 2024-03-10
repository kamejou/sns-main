@extends('layouts.login')

@section('content')
<div class="whole profile_top">
    <div class="profile_margin">
        <img src="{{ asset('images/' . Auth::user()->images) }}" class="example1 margin_top">
    </div>
    <div class="left">
    {!! Form::open(['url' => '/update/top','method' => 'POST']) !!}
    <div class="whole margin_top">
        <div class="profile_item">{{ Form::label('username', 'ユーザー名')}}</div>
        <div class="profile_input_item">{{ Form::text('username', Auth::user()-> username, ['class' => 'input']) }}</div>
    </div>

    <br>

    <div class="whole margin_top">
        <div class="profile_item">{{ Form::label('email', 'メールアドレス') }}</div>
        <div class="profile_input_item">{{ Form::email('mail', Auth::user()-> mail, ['class' => 'input']) }}</div>
    </div>

    <br>

    <div class="whole margin_top">
        <div class="profile_item">{{ Form::label('password', 'パスワード') }}</div>
        <div class="profile_input_item">{{ Form::password('password', ['class' => 'input']) }}</div>
    </div>

    <br>

    <div class="whole margin_top">
        <div class="profile_item">{{ Form::label('password_confirm', 'パスワード確認') }}</div>
        <div class="profile_input_item">{{ Form::password('password_confirmation', ['class' => 'input']) }}</div>
    </div>

    <br>

    <div class="whole margin_top">
        <div class="profile_item">{{ Form::label('bio', '自己紹介文') }}</div>
        <div class="profile_input_item">{{ Form::textarea('bio', optional(Auth::user())->bio, ['class' => 'input']) }}</div>
    </div>

    <br>

    <div class="whole margin_top">
        <div class="profile_item">{{ Form::label('images', 'アイコンのアップロード') }}</div>
        <div class="profile_input_item">
            <label class="upload-label">
                <p class="p_size">ファイルを選択</p>
                {{ Form::file('images', ['class' => 'input']) }}
            </label>
        </div>
    </div>

    <br>

    <div class="btn_block">{{ Form::submit('更新', ['class' => 'input_btn']) }}</div>
    {!! Form::close() !!}
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
@endsection
