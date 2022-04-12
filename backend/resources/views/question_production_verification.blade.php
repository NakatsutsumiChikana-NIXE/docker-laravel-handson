<html lang="ja">
<head>
	<title>question_pproduction_verification</title>
</head>
	<body>
    <p>問題一覧</p>
    @foreach ($questions as $question)
            <!--nameが名前、contentsがコメント、summaryが、お知らせ-->
            <p>{{ $question->id }}　{{ $question->contents }}　{{ $question->message}}</p> 
    @endforeach


	</body>
</html>
