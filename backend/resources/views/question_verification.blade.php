<html lang="ja">
<head>
	<title>verification</title>
</head>
	<body>
		<form method = "get" action = "{{ route('question_top')}}">
        @csrf
                    <p>問題の内容：</p>
                    <p>問題文の選択肢：</p>
                    <p>問題の答え：</p>
                    <button type="submit">送信</button>
                </form>


	</body>
</html>
