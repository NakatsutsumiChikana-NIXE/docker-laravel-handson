<html lang="ja">

    <head>
        <title>Lucky_color</title>
    </head>
        <body bgcolor= #fffaf0>
            <center>
            <h1>南部弁クイズ</h1>
            <h2>Q1:これはなんと言っているでしょう？</h2>
            <h3>「鍵いなぐなった」</h3>
            <p>上の訛りの使い方の例:「お母さん鍵いなぐなったんだけど、どこにやったかわかる。」</p>
            <form method = "post" action = /Dialect＿1>
                    @csrf
                        <dd>
                            <select name="select_Dialect">
                                <option>選択してください</option>
                                <option value="1">鍵を壊した</option>
                                <option value="2">鍵を捨てた</option>
                                <option value="3">鍵を失くした</option>
                                <option value="4">鍵を忘れた</option>
                            </select>
                            <input type = "submit">
                        </dd>
                    </form>

            </center>
        </div>
        </body>
</html>
