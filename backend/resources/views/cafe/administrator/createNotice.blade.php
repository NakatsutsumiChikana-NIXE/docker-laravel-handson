<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>業務連絡新規作成画面</title>
        <link rel="stylesheet" href="{{ asset('/css/cafe/administrator.css') }}">
        <link rel="stylesheet" href="/css/bootstrap.css">
    </head>
    <body>
        <header class="mt-3">
            <h1>お知らせ 新規作成</h1>
        </header>
        <div class="contact-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            お知らせを新規で作成する
                        </div>
                        <div class="col-sm-6">
                            <form method="post" action="/cafe_administrator">
                                @csrf
                                <div class="text-right">
                                    <button type="submit" class="btn btn-secondary" name="userData" value="{{ $userData }}">戻る</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <form class="mb-0" method="post" action="/cafe_administrator/create_notice">
                    @csrf
                    <div class="card-body">
                        <textarea rows="4" cols="100" name="newNotice" required></textarea>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" name="userData" value="{{ $userData }}">追加</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
