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
        <div>
            <div class="text-center">
                <div class="menu-border">
                    <h1 class="mt-3">Menu</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-4">
                    <div class="text-center">
                        <img class="menu" src="/cafe/menu1.jpg" alt="日替わりランチ" />
                    </div>
                    <p class="text-center pt-3">日替わりランチ</p>
                </div>
                <div class="col-sm-4">
                    <div class="text-center">
                        <img class="menu" src="/cafe/menu2.jpg" alt="タルト" />
                    </div>
                    <p class="text-center pt-3">タルト</p>
                </div>
                <div class="col-sm-4">
                    <div class="text-center">
                        <img class="menu" src="/cafe/menu5.jpg" alt="ピザトースト" />
                    </div>
                    <p class="text-center pt-3">ピザトースト</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="text-center">
                        <img class="menu" src="/cafe/menu3.jpg" alt="キャラメルマキアート" />
                    </div>
                    <p class="text-center pt-3">キャラメルマキアート</p>
                </div>
                <div class="col-sm-4">
                    <div class="text-center">
                        <img class="menu" src="/cafe/menu4.jpg" alt="レモンティー" />
                    </div>
                    <p class="text-center pt-3">レモンティー</p>
                </div>
                <div class="col-sm-4"></div>
            </div>
            {{-- <div class="menu-position" style="right: 1450px;">
                <img class="menu" src="/cafe/menu1.jpg" alt="日替わりランチ" />
                <p class="text-center pt-3">日替わりランチ</p>
            </div>
            <div class="menu-position" style="right: 1000px;">
                <img class="menu" src="/cafe/menu2.jpg" alt="タルト" />
                <p class="text-center pt-3">タルト</p>
            </div>
            <div class="menu-position" style="right: 550px;">
                <img class="menu" src="/cafe/menu3.jpg" alt="キャラメルマキアート" />
                <p class="text-center pt-3">キャラメルマキアート</p>
            </div>
            <div class="menu-position" style="right: 550px;">
                <img class="menu" src="/cafe/menu4.jpg" alt="レモンティー" />
                <p class="text-center pt-3">レモンティー</p>
            </div> --}}
        </div>
    </body>
</html>
