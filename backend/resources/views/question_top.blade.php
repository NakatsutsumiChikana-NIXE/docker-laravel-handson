<html lang="ja">
<head>
	<title>question_top</title>
</head>
	<body　bgcolor= #fffaf0>
		<h1>クイズ！</h1>
        <p>あなたは何問解けるかな？</p>
        <form method = "post" action = "{{ route('question_display')}}">
            <input type="hidden" name="count" value="{{$count}}">        
            @csrf
            <button type="submit">ゲームスタート</button>
        </form>
        <form method = "get" action = "{{route('question_create')}}">
            <button type="submit">問題を作る</button>
        </form>
	</body>
</html>