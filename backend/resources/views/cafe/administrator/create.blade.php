<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>カフェ_管理者アカウント作成画面</title>
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
                <div class="mt-4 mb-2">
                    <label for="name">名前</label>
                    <input id="name" type="text" name="name" required>
                </div>
                <div class="mb-2">
                    <div class="pr-45">
                        <label for="password">パスワード</label>
                        <input id="password" type="text" name="password" required>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="pr-15">
                        <label for="birthday">誕生日</label>
                        <input id="birthday" type="date" name="birthday" class="birthday" required>
                    </div>
                </div>
                <div class="row mb-2" style="margin-left: 900px;">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="man" value="1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                          男
                        </label>
                    </div>
                    <div class="form-check" style="margin-left: 20px;">
                        <input class="form-check-input" type="radio" name="sex" id="woman" value="2">
                        <label class="form-check-label" for="exampleRadios1">
                          女
                        </label>
                    </div>
                </div>
                <button type = "submit" class="btn btn-primary login-button" style="margin-left: 35px;">登録</button>
            </form>
        </div>
    </body>
</html>
