<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>メニュー</title>
        <link rel="stylesheet" href="{{ asset('/css/cafe/menu-bar.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/cafe/menu.css') }}">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <header>
        <x-index.cafe-menu-bar />
    </header>
    <body>
        <div class="header-img"></div>
        <div class="text-center">
            <div class="menu-border">
                <h1>Menu</h1>
            </div>
        </div>
        <div class="menu1-position">
            <p class="text-center">日替わりランチ</p>
            <img class="menu1" src="/cafe/menu1.jpg" alt="" />
        </div>
    </body>
</html>
