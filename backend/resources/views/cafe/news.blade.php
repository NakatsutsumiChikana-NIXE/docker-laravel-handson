<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>News</title>
        <link rel="stylesheet" href="{{ asset('/css/cafe/menu-bar.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/cafe/news.css') }}">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <header>
        <x-index.cafe-menu-bar />
    </header>
    <body>
        @php
            $date = explode('/', $nowDate);
            $year = $date[0];
            $days = $date[1] . '/' . $date[2];
        @endphp

        <div class="left-and-right-margin">
            <div class="text-center">
                <div class="news-border">
                    <h1 class="mt-3">News</h1>
                </div>
                <div class="date-position">
                    <p class="now-date mb-0">{{ $days }}<span>{{ $year }}</span></p>
                </div>
            </div>
            <div class="news-position left-and-right-margin">

                @foreach ($news as $display)
                    <strong>投稿日: {{ $display['created_at'] }}</strong>
                    <div class="mt-3 box mb-5">
                        <span>{!! $display['noticeContent'] !!}<span>
                        @if(!empty($display['image']))
                            <div class="text-right">
                                <img class="img-size" src="{{ asset('storage/' . $display['image']) }}" alt="Uploaded Image">
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
