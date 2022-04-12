<!DOCTYPE>
<html lang="ja">
    <head>
        <title>question_answer</title>
    </head>
	<body>
		<h1>答え</h1>

        <p>{{$result_message}}</p>
        <form method = "post" action = "{{ route('question_display')}}">
            @csrf
            <button type="submit">次へ</button>
        </form>
        <input type="hidden" name="correct_count" value="{{$correct_count}}">

	</body>
</html>
