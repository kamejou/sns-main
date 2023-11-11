@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p>AtlasSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<form name="Login" method="post" action="/cgi-bin/Login.cgi"></form>
<p><a href="/register">新規ユーザーの方はこちら</a></p>


{!! Form::close()!!}

@endsection
