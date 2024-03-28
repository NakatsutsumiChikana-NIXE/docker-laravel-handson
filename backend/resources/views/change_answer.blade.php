<!DOCTYPE>
<html lang="ja">
    <head>
        <title>new Registration</title>
    </head>
        <body bgcolor= #fffaf0>
            <center>
            <h1>変更確認画面</h1>
                <form method = "get" action = "welcome">
                    @csrf
                    <p>名前：{{$name}}　内容：{{$contents}}　お知らせ：{{$summary}}</p>
                    <input type="hidden" name="page" value="{{$page}}">
                    <button type="submit">送信</button>
                </form>
                <p>{{$error}}</p>
        </body>
</html>
