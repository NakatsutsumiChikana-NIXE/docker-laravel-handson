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
            <h1>ログイン</h1>
            <div class="login-card-position mt-3">
                <div class="card login-card">
                    <div class="card-body">
                        <form method = "post" action = "/cafe_administrator">
                            @csrf
                                <dd><p><input type = "text" name = "employee_id" placeholder="社員ID"></p></dd> 
                                <dd><p><input type = "text" name = "name" placeholder="アカウント名"></p></dd>         
                                <dd><p><input type = "password" name = "password" placeholder="パスワード" maxlength="6"></p></dd>
                                <button type = "submit" class="btn btn-primary login-button">ログイン</button>
                        </form>
                        <a href="{{ route('create') }}">新規アカウント作成</a>
                    </div>
                </div>
            </div>

            @if (!empty($error))
                <div class="mt-2 text-danger">
                    {{$error}}
                </div>
            @endif
        </div>
    </body>
</html>
