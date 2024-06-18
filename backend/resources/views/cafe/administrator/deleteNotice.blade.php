<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>業務連絡編集画面</title>
        <link rel="stylesheet" href="{{ asset('/css/cafe/administrator.css') }}">
        <link rel="stylesheet" href="/css/bootstrap.css">
    </head>
    <body>
        <header class="mt-3">
            <h1>業務連絡 削除画面</h1>
        </header>
        <div class="contact-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            削除対象の情報
                        </div>
                        <div class="col-sm-6">
                            <form class="mb-0" method="post" action="/cafe_administrator">
                                @csrf
                                <div class="text-right">
                                    <button type="submit" class="btn btn-secondary" name="userData" value="{{ $userId }}">戻る</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <form method="post" action="/cafe_administrator/delete_notice">
                    @csrf
                    <div class="card-body">
                        <div>
                            <label for="comment"><strong>削除対象コメント:</strong></label>
                            <span id="comment">{{ $noticeContent }}</span>
                        </div>
                        <div>
                            <label for="author"><strong>投稿者:</strong></label>
                            <span id="author">{{ $author }}</span>
                        </div>
                        <div>
                            <label for="changer"><strong>更新者:</strong></label>
                            <span id="changer">{{ $changer }}</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button type="submit" class="btn btn-danger" name="deleteId" value="{{ $userAndCommentId }}">削除</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mt-3 text-danger">
                削除するデータにお間違えないかご確認のうえ削除ボタンを押してください。
            </div>
        </div>
    </body>
</html>
