@extends('layouts.login')
@section('content')
<form action="/search" method="GET" >
    <input type="text" name="username" placeholder="ユーザー名を入力" name="search" value="">
    <div>
        <button type="submit">検索</a></button>
    </div>
</form>
@if(isset($search))
    <h2>検索結果: "{{ $search }}"</h2>
@endif
<br>

  @foreach ($users as $user)
<tr>
  <td><img src="{{ asset('images/icon1.png') }}"></td>
  <td>{{ $user->username }}</td>

  <div class="d-flex justify-content-end flex-grow-1">
@if (auth()->user()->isFollowing($user->id))

        <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
    @else
        <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
            {{ csrf_field() }}

            <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
    @endif
    </div>

  <br>
</tr>


@endforeach

<script>
    export default {
        props:['userId', 'defaultFollowed', 'defaultCount'],
        data() {
          return{
              followed: false,
              followCount: 0,
          };
        },
        created() {
          this.followed = this.defaultFollowed
          this.followCount = this.defaultCount
        },

        methods: {
          follow(userId) {
            let url = `/users/${userId}/follow`

            axios.post(url)
            .then(response => {
                this.followed = true;
                this.followCount = response.data.followCount;
            })
            .catch(error => {
              alert(error)
            });
          },
          unfollow(userId) {
            let url = `/users/${userId}/unfollow`

            axios.post(url)
            .then(response => {
                this.followed = false;
                this.followCount = response.data.followCount;
            })
            .catch(error => {
              alert(error)
            });
          }
        }
    }
</script>
<style scoped>
    .follow{
        display: inline-block;
        border: 1px solid #CFCABF;
        border-radius: 5%;
        padding:7px;
        cursor: pointer;
    }
    .unfollow{
        display: inline-block;
        border: 1px solid #CFCABF;
        border-radius: 5%;
        padding:7px;
        cursor: pointer;
    }
    .unfollow:hover{
        background-color: #2983FD;
        color: #FFF;
    }
    .follow:hover{
        background-color: #2983FD;
        color: #FFF;
    }
</style>

@endsection
