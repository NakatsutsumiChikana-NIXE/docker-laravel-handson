<html lang="ja">
<head>
	<title>question_top</title>
</head>
	<body　bgcolor= #fffaf0>
		<h1>クイズ！</h1>
        @foreach ($products as $question)
                                <!--nameが名前、contentsがコメント、summaryが、お知らせ-->
                                    <h2>Q{{ $question->id }}</h2> 
                                    <h3> {{ $question->question_contents }}</h3>  
                                    <p>{{ $question->question_message }} </p>
                                    　<button type = "submit">次の問題へ</button></p>
                                    <input type = "hidden" name = "id" value = "{{ $book->id }}">
                                    <input type = "hidden" name = "page" value = "{{$products->currentPage()}}">
                                </form>
                            @endforeach


        <form method = "post" action = "{{ route('question_page') }}">
            <button type="submit">問題を作る</button>
        </form>
	</body>
</html>
