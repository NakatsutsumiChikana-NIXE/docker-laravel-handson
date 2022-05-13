<html>
    <head>
    <meta charset="utf-8">
        <title>TwitterPseudon Setup</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/TwitterPseudo.css') }}">
    </head>
    <body>
        <div class="jumbotron">
            <h1 class="text-primary display-4 text-center">アカウント設定</h1>
        </div>
        <form action="/SetupConfirmation" method="post" enctype='multipart/form-data'>
            @csrf
            <br>
            <p class="text-center font-weight-bold">ニックネーム（必須）<br>
            <input type="text" name="name"></p>
            <p class="text-center font-weight-bold">生年月日<br>
            <input type="date" name="birthday"></p>
            <div class="text-center">
                <p class="text-center font-weight-bold">ひとことコメント<br>
                <input type="text" class="textarea" name="comment"></p>
                <input class="btn btn-info" type="submit" value="設定完了">
            </div>
            {{ csrf_field() }}
        </form>
    </body>
<html>