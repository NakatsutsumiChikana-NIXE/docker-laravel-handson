<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>レビュー内容確認画面</title>
        <link rel="stylesheet" href="{{ asset('/css/cafe/administrator.css') }}">
        <link rel="stylesheet" href="/css/bootstrap.css">
    </head>
    <body>
        <header class="mt-3">
            <div class="row">
                <div class="col-sm-6">
                    <h1>レビュー内容確認 画面</h1>
                </div>
                <div class="col-sm-6 text-right pr-5">
                    <form method="post" action="/cafe_administrator">
                        @csrf
                        <button class="btn btn-secondary" name="userData" value="{{ $userId }}">戻る</button>
                    </form>
                </div>
            </div>
        </header>
        <table class="table table-striped p-4" id="reviews" style="white-space: normal;">
            <thead>
                <tr>
                    <th class="text-center">ニックネーム</th>
                    <th class="text-center">コメント</th>
                    <th class="text-center">満足度</th>
                    <th class="text-center">削除理由</th>
                    <th class="text-center">削除者</th>
                    <th class="text-center">削除された日</th>
                </tr>
            </thead>
            <tbody>
                @if(!is_null($deletedReviews))
                    @foreach ($deletedReviews as $deletedReview)
                        <tr style="height: 60px; background-color: #FFF; border-bottom:1px #eee solid;">
                            <td class="text-center pb-0">
                                <span>{{ $deletedReview['nickname'] }}</span>
                            </td>
                            <td class="text-center pb-0">
                                <span>{!! $deletedReview['reviewComment'] !!}</span>
                            </td>
                            <td class="text-center pb-0">
                                {{ $deletedReview['numOfStars'] }}
                            </td>
                            <td class="text-center pb-0">
                                {!! $deletedReview['reasonForDeletion'] !!}
                            </td>
                            <td class="text-center pb-0">
                                {{ $deletedReview['deletedBy'] }}
                            </td>
                            <td class="text-center pb-0">
                                {{ $deletedReview['created_at'] }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr style="height: 60px; background-color: #FFF; border-bottom:1px #eee solid;">
                        <td colspan="6" class="text-center">現在、誰もレビューを記載しておりません</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </body>
</html>
