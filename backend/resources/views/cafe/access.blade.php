<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アクセス</title>
        <link rel="stylesheet" href="{{ asset('/css/cafe/menu-bar.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/cafe/access.css') }}">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <header>
        <x-index.cafe-menu-bar />
    </header>
    <body>
        <div class="left-and-right-margin">
            <div class="text-center">
                <div class="access-border">
                    <h1 class="mt-3">アクセス方法</h1>
                </div>
            </div>
        </div>
        <div class="store-name">
            <h3 class="sub-title">KEKU CAFE(ケクー・カフェ)</h3>
            <p>
                住所: 青森県<br>
                電話: 0000-00-0000<br>
                営業時間: 11:30 〜 21:30<br>
                定休日: 月曜・火曜<br>
            </p>
        </div>
        <div class="map-position">
            @include('layout.map')
        </div>
    </body>
</html>
