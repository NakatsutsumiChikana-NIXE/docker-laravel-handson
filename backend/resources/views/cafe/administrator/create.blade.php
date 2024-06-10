<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>カフェ_管理者画面</title>
        <link rel="stylesheet" href="{{ asset('/css/cafe/administrator.css') }}">
        <link rel="stylesheet" href="/css/bootstrap.css">
    </head>
    <body>
        <div class="text-center mt-5">
            @if (!empty($error))
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <div class="card mb-3 create-card" style="padding-left:40px;">
                            {{$error}}
                        </div>
                    </div>
                </div>
            @endif

            <h1>新規アカウント作成</h1>
            <form method = "post" action = "/cafe_administrator/registration">
                @csrf
                <div>
                    <p>名前</p>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <p>パスワード</p>
                    <input type="text" name="password" required>
                </div>
                <div>
                    <p>誕生日</p>
                    <input type="date" name="birthday" required>
                </div>
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="man" value="1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                          男
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="woman" value="2">
                        <label class="form-check-label" for="exampleRadios1">
                          女
                        </label>
                    </div>
                </div>
                <button type = "submit" class="btn btn-primary login-button">登録</button>
            </form>
        </div>
    </body>
</html>
