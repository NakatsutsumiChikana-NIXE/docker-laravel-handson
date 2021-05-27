<!DOCTYPE>
<html lang="ja">
    <head>
        <title>new Registration</title>
    </head>
        <body bgcolor= #fffaf0>
            <center>
            <h1>変更画面</h1>
            <h2>パスワードを入力してください</h2>
            <p>※パスワードが間違っていた場合変更できません。ご注意いください</p>
            <p>パスワード：<input type = "integer" name = "delete_psw"></p>
            <p>ID:{{$id}}　名前：{{$name}}　内容：{{$contents}}　お知らせ：{{$summary}}</p>
                <form method = "post" action = "{{ route('change_page') }}">
                    <input type="hidden" name="_method" value="put">
                    <input type = "hidden" name = "id" value = "{{$id}}">
                    <p>　　名前：<input type = "text" name = "name"></p>
                    <p>コメント：<textarea type = "text" name = "contents" ></textarea></p>
                    <p>お知らせ：<textarea type = "text" name = "summary" ></textarea></p>
                    <input type = "hidden" name = "page" value = "{{$page}}">
                    @csrf
                    <button type="submit">送信</button>
                </form>
            <p>先ほど貴方がいたページは{{$page}}ページです。</p>
        </body>
</html>
