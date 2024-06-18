<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>お知らせ編集画面</title>
        <link rel="stylesheet" href="{{ asset('/css/cafe/administrator.css') }}">
        <link rel="stylesheet" href="/css/bootstrap.css">
    </head>
    <body>
        <header class="mt-3">
            <h1>お知らせの編集</h1>
        </header>
        <div class="contact-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            お知らせを編集
                        </div>
                        <div class="col-sm-6">
                            <form method="post" action="/cafe_administrator">
                                @csrf
                                <div class="text-right">
                                    <button type="submit" class="btn btn-secondary" name="userData" value="{{ $userId }}">戻る</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <form method="post" action="/cafe_administrator/edit_notice">
                    @csrf
                    <div class="card-body">
                        <textarea rows="4" cols="100" name="editNotice" required>{{ $noticeContent }}</textarea>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" name="employeeAndNoticeId" value="{{ $editId }}">編集</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
