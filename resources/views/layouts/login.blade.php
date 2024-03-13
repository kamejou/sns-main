<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('main.js') }}"></script>

    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div  class="main-menu">
            <div class="margin_left">
                <h1><a href="/top"><img src="{{ asset('images/atlas.png') }}" alt=""></a></h1>
            </div>
            <div class="">
                @auth
                <p class="white user_name_item">{{ Auth::user()-> username }} 　さん</p>
                <section class="accordion">
                    <input id="block-01" type="checkbox" class="toggle">
                    <label class="Label" for="block-01"></label>
                    <div class="content">
                        <div class="sp-menu__list">
                            <button class="sp-menu__item back_white"><a href="/top" class="sp-menu__link grey font_item">ホーム</a></button>
                            <button class="sp-menu__item back_white"><a href="/profile" class="sp-menu__link grey font_item">プロフィール編集</a></button>
                            <button class="sp-menu__item back_white "><a href="/logout" class="sp-menu__link grey font_item">ログアウト</a></button>
                        </div>
                    </div>
                </section>
                <img src="{{ asset('images/' . Auth::user()->images) }}" class="example1 main_item">
                @endauth
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="account_top">{{ Auth::user()-> username }}さんの</p>
                <div class="follow-info">
                    <p>フォロー数</p>
                    <p>{{ \App\Follow::where('following_id', Auth::user()-> id)->count() }}名</p>
                </div>
                <button class="side_btn right_btn"><a href="/follow-list" class="white">フォローリスト</a></button>
                <div class="follow-info">
                    <p>フォロワー数</p>
                    <p>{{ \App\Follow::where('followed_id', Auth::user()-> id)->count() }}名</p>
                </div>
                <button class="side_btn right_btn"><a href="/follower-list" class="white">フォロワーリスト</a></button>
            </div>
            <hr class="line2">
            <button class="side_btn center"><a href="/search" class="white">ユーザー検索</a></button>
        </div>
    </div>
    <footer>
        <!-- <script>
          $(function(){ // if document is ready
  alert('hello world')
});
        </script> -->



<!-- <script>


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
</script> -->


    </footer>

    </body>
</html>

<!--
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*アコーディオン全体*/
.menu {
    position: relative;
    width: 10%;
    padding: 10px 10px 20px;
}

.menu input {
    display: none;
    /*チェックボックスを隠す*/
}

/*バー部分*/
.menu label {
    cursor: pointer;
    display: block;
    text-decoration: none;
    line-height: 1;
    position: relative;
    color: #fff;
    font-size: 20px;
}

/*開いたときに表示される部分*/
.menu ul {
    margin: 0;
    padding: 0;
    list-style: none;
    margin-bottom: 1px;
}

.menu li {
    height: 0;
    overflow-y: hidden;
    transition: padding-bottom 0.5s, padding-top 0.5s;
    /*閉じるときのアニメーション*/
    -webkit-transition: padding-bottom 0.5s, padding-top 0.5s;
    -moz-transition: padding-bottom 0.5s, padding-top 0.5s;
    -ms-transition: padding-bottom 0.5s, padding-top 0.5s;
    -o-transition: padding-bottom 0.5s, padding-top 0.5s;
}

#menu_bar01:checked~#links01 li,
#menu_bar02:checked~#links02 li {
    height: auto;
    /*開いたときに表示されるliの高さ*/
    opacity: 1;
    background: #f1f1f1;
    padding: 10px;
}


/*閉じた状態の矢印描画*/
.menu label::before {
    content: "";
    display: block;
    width: 8px;
    height: 8px;
    border-top: #fff 2px solid;
    border-right: #fff 2px solid;
    -webkit-transform: rotate(135deg);
    -ms-transform: rotate(135deg);
    transform: rotate(135deg);
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 15%;
    margin: auto;
}

/*開いた状態の矢印描画*/
.menu input:checked+label::after {
    content: "";
    display: block;
    width: 8px;
    height: 8px;
    border-top: #fff 2px solid;
    border-right: #fff 2px solid;
    -webkit-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    transform: rotate(-45deg);
    position: absolute;
    right: 2%;
    top: 7%;
    bottom: 0;
    margin: auto;
}

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */ -->
