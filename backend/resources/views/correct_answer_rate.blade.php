<!DOCTYPE>
<html lang="ja">
<head>
	<title>correct_ansewr_rate</title>
</head>
	<body>
    <h1>正解率</h1>

    <p>貴方の正解率は{{$ccorrect_answer_rate}}%です。</p>

    <form method = "post" action = "{{ route('question_top')}}">
        <button type="submit">ホームへ戻る</button>

    </form>
	</body>
</html>
