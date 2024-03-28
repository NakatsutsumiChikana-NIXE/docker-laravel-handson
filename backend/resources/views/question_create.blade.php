<html lang="ja">
<head>
	<title>question_top</title>
</head>
	<body>
		<form method = "post" action = "{{ route('question_save')}}">
            <input type="hidden" name="_method" value="put">                    
            @csrf
                    <p>IDを入力してください：<input type = "integer" name = "create_id"></p>
                    <p>問題の内容：<textarea type = "text" name = "contents"></textarea></p>
                    <p>問題文の選択肢：<textarea type = "text" name = "message" ></textarea></p>
                    <p>問題の答え：<textarea type = "integer" name = "answer" ></textarea></p>
                    <button type="submit">送信</button>
        </form>
		<form method = "post" action = "{{ route('question_edit')}}">
        <input type="hidden" name="_method" value="put">
        @csrf
            <p>編集</p>
            <p>IDを入力してください：<input type = "integer" name = "create_id"></p>
            <p>問題の内容：<textarea type = "text" name = "contents"></textarea></p>
            <p>問題文の選択肢：<textarea type = "text" name = "message" ></textarea></p>
            <p>問題の答え：<textarea type = "integer" name = "answer" ></textarea></p>
            <button type="submit">編集</button>
            <form method= "get" action = "{{route('question_production_verification')}}">
            <button type="submit">問題一覧へ</button>
        </form>


	</body>
</html>
