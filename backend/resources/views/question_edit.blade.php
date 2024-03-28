<!DOCTYPE>
<html lang="ja">
<head>
	<title>question_edit</title>
</head>
	<body>

    {{$create_id}}{{$message}}{{$answer}}{{$contents}}
    <form method = "post" action = "{{ route('question_top')}}">
        <button type="submit">ホームへ戻る</button>

    </form>
	</body>
</html>
