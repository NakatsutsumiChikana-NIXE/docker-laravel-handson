<html>
    <head>
    <meta charset="utf-8">
        <title>TwitterPseudon Home</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/TwitterPseudo.css') }}">
    </head>
    <body>
        <div class="jumbotron">
            <h1 class="text-primary display-4 text-center">設定</h1>
        </div>
        <form action="/hello" method="post" enctype='multipart/form-data'>
            <p class="text-center">画像設定</p>
            <div class="text-center">
                <input type="file" class="text-center" name="filuup" accept="image/jpeg, image/png">
            </div>
            <br>
            <p class="text-center">ニックネーム（必須）<br>
            <input type="text" name="name"></p>
            <div class="text-center">
                <p class="text-center">ひとことコメント<br>
                <input type="text" class="textarea" name="comment"></p>
                <input class="btn btn-info" type="submit" value="設定完了">
            </div>
        </form>
    </body>
<html>