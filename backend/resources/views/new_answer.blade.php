<!DOCTYPE>
<html lang="ja">
    <head>
        <title>new Registration</title>
    </head>
        <body bgcolor= #fffaf0>
            <center>
                <h1>新規作成　確認画面</h1>
                    <form method = "post" action = "welcome">
                        @csrf
                        <p>名前：{{$name}}　内容：{{$contents}}　お知らせ：{{$summary}}</p>
                        <button type="submit">送信</button>
                    </form>
                    <p>{{$error}}</p>
            </center>
        </body>
</html>
