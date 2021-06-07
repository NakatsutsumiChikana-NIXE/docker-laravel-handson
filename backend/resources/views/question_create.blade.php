<html lang="ja">
<head>
	<title>question_top</title>
</head>
	<body>
		<form method = "post" action = "{{ route('question_save')}}">
        <input type="hidden" name="_method" value="put">                    
        @csrf
                    <p>問題の内容：<textarea type = "text" name = "contents"></textarea></p>
                    <p>問題文の選択肢：<textarea type = "text" name = "message" ></textarea></p>
                    <p>問題の答え：<textarea type = "integer" name = "answer" ></textarea></p>
                    <button type="submit">送信</button>
                </form>


	</body>
</html>
