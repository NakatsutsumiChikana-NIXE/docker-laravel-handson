<!DOCTYPE>
<html lang="ja">
    <head>
        <title>new Registration</title>
    </head>
        <body bgcolor= #fffaf0>
            <center>
            <h1>新規作成画面</h1>
                <form method = "post" action = "{{ route('bulletin') }}">
                    @csrf
                    <p>　　名前：<input type = "text" name = "name"></p>
                    <p>パスワード：<input type = "integer" name = "password"></p>
                    <p>コメント：<textarea type = "text" name = "contents" ></textarea></p>
                    <p>お知らせ：<textarea type = "text" name = "summary" ></textarea></p>
                    <button type="submit">送信</button>
                </form>
        </body>
</html>
