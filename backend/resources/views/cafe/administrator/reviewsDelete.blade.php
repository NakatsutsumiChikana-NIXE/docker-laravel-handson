<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>レビュー内容削除画面</title>
        <link rel="stylesheet" href="{{ asset('/css/cafe/administrator.css') }}">
        <link rel="stylesheet" href="/css/bootstrap.css">
    </head>
    <body>
        <header class="mt-3">
            <div class="row">
                <div class="col-sm-4">
                    <h1>レビュー内容削除 画面</h1>
                </div>
                <div class="col-sm-8">
                    <span class="text-danger" style="padding-left: 50px">※ 間違えがないように内容を確認し、不適切なレビューの場合だけ削除をするようにしてください</span>
                </div>
            </div>
        </header>
        <div class="card contact-card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        削除対象のレビュー
                    </div>
                    <div class="col-sm-8">
                        <div class="row" style="margin-left: 240px">
                            <form class="mb-0" method="post" action="/cafe_administrator/reviews">
                                @csrf
                                <button class="btn btn-secondary" name="userId" value="{{ $userId }}">一つ前のページに戻る</button>
                            </form>
                            <form class="mb-0 pl-2" method="post" action="/cafe_administrator">
                                @csrf
                                <button class="btn btn-secondary" name="userData" value="{{ $userId }}">HOMEに戻る</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    ニックネーム: {{ $nickname }}
                </div>
                <div>
                    レビュー内容: {{ $reviewComment }}
                </div>
                <div>
                    満足度: {{ $levelOfSatisfaction }}
                </div>
            </div>
        </div>
        <div class="card contact-card mt-5">
            <div class="card-body">
                <form method="post" action="/cafe_administrator/reviews_delete">
                    @csrf
                    <div class="review-flex mb-3">
                        <label for="deletedBy" class="label-width">削除者の名前</label>
                        <input type="text" id="deletedBy" name="deletedBy" class="input-width-400" required />
                    </div>
                    <div class="review-flex mb-3">
                        <label for="employeeId" class="label-width">社員ID</label>
                        <input type="text" id="employeeId" name="employeeId" class="input-width-400" required />
                    </div>
                    <div class="review-flex mb-3">
                        <label for="reason" class="label-width">削除理由</label>
                        <textarea type="text" id="reason" name="reasonForDeletion" class="nickname-form-size" required></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" name="startDelete" value="{{ $deleteId }}">送信</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
