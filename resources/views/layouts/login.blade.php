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
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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
        <div id = "head">
        <h1><a href="/top"><img src="{{ asset('images/atlas.png') }}" alt=""></a></h1>
        <div id="">
            <div class="menu">
                <input type="checkbox" id="menu_bar01" />
                @auth
                <label for="menu_bar01"><p>{{ Auth::user()-> username }}さん<img src="images/arrow.png"></p></label>
                @endauth
                <ul id="links01">
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
                <a href="https://laravel.com/docs"><button class='btn btn-default'>Docs</button></a>
                <a href="https://laracasts.com"><button class='btn btn-primary'>Laracasts</button></a>
                <a href="https://laravel-news.com"><button class='btn btn-success'>News</button></a>
                <a href="https://blog.laravel.com"><button class='btn btn-info'>Blog</button></a>
                <a href="https://nova.laravel.com"><button class='btn btn-warning'>Nova</button></a>
                <a href="https://forge.laravel.com"><button class='btn btn-danger'>Forge</button></a>
                <a href="https://vapor.laravel.com"><button class='btn btn-link'>Vapor</button></a>
                <a href="https://github.com/laravel/laravel"><button class='btn btn-primary'>GitHub</button></a>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()-> username }}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
        <script>
          $(function(){ // if document is ready
  alert('hello world')
});
        </script>
    </footer>

    </body>
</html>
