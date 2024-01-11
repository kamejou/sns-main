@extends('layouts.login')

@section('content')
フォロワーリスト


<follow-component
:user-id = "{{ json_encode($user->id) }}"
:default-Followed = "{{ json_encode($defaultFollowed) }}"
:default-Count = "{{ json_encode($defaultCount) }}"
></follow-component>



@endsection
