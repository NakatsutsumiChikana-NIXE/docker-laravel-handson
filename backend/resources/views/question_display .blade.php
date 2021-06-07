<html lang="ja">
<head>
	<title>question_top</title>
</head>
	<body>
		<form method = "post" action = "{{ route('question_display') }}">
                    @csrf
                    <p>問題の内容：<input type = "text" name = "contents"></p>
                    <p>問題文の選択肢：<textarea type = "text" name = "message" ></textarea></p>
                    <p>問題の答え：<textarea type = "text" name = "answer" ></textarea></p>
                    <button type="submit">送信</button>
                </form>


	</body>
</html>
