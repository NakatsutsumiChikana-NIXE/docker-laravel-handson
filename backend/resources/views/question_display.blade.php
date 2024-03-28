<!DOCTYPE>
<html lang="ja">
    <head>
        <title>question_top</title>
    </head>
	<body>
		<h1>クイズ！</h1>

        <p>{{$contents}}</p>

        <p>{{$message}}</p>


        <form method = "post" action = "{{ route('question_answer')}}">
        @csrf
            <input type="hidden" name="count" value="{{$count}}">
            <input type="hidden" name="answer" value="{{$answer}}">
            <input type="radio" name="gender" value="1">1<br>
            <input type="radio" name="gender" value="2">2<br>
            <input type="radio" name="gender" value="3">3<br>   
            <button type="submit">次へ</button>
        </form>
	</body>
</html>
