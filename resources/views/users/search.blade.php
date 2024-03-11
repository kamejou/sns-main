@extends('layouts.login')
@section('content')
<div class="flex_container margin_left margin_top">
  <form action="/search" method="GET" >
      <input type="text" name="username" class="textbox" placeholder="ユーザー名" name="search" value="">
      <button type="submit" value="submit" class="search_box">
        <span class="material-symbols-outlined"><img src="{{ asset('images/search_360.png') }}" alt="search" class="example1"></span>
      </button>
  </form>
  <div class="margin_left_item">
    @if(isset($search))
      <h2>検索ワード　:　{{ $search }}</h2>
    @endif
  </div>
</div>
<br>
 <hr class="line">

@foreach ($users as $user)
  @if ($user->id !== auth()->user()->id)
    <div class="flex_container margin_top center margin_left_item">
      <div><img src="{{ asset('images/' . $user->images) }}" class="example1"></div>
      <div class="margin_left width_item font_item">{{ $user->username }}</div>

      <div class="">
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
    </div>
  @endif
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
