<html lang="ja">
    <head>
        <title>bulletin</title>
    </head>
        <body bgcolor= #fffaf0>
            <center>
            <h1>掲示板表示テスト</h1>

            <p>名前：{{$name}}</p>
            <p>内容：{{$contents}}</p>
            <p>お知らせ:{{$summary}}</p>

            <form method = "post" action = "{{ route('info') }}">
                @csrf
                <input type = "hidden" name = "name" value = "{{$name}}">
                <input type = "hidden" name = "contents" value = "{{$contents}}">
                <input type = "hidden" name = "summary" value = "{{$summary}}">
                    <button type = "submit">記入に間違えがない場合はボタンを押してください</button>
                </form>
            </center>
        </body>
</html>
