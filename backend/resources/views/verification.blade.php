<!DOCTYPE>
<html lang="ja">
    <head>
        <title>new Registration</title>
    </head>
        <body bgcolor= #fffaf0>
            <center>
                <h1>new掲示板　確認画面</h1>
                    <form method = "get" action = "bulletin_board">
                        @csrf
                        <p>　名前：{{$name}}　内容：{{$contents}}　パスワード：{{$psw}}</p>
                        <button type="submit">送信</button>
                    </form>
                    <p>本日の貴方の運勢は{{$rand}}</p>
                    <p>{{$comment}}</p>
            </center>
        </body>
</html>
