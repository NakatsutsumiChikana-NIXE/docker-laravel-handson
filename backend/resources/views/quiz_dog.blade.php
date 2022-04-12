<!DOCTYPE>
<html lang="ja">

    <head>
        <title>quiz</title>
    </head>
        <body bgcolor= #f5f5f5>
            <center>
                <h1>動物クイズ</h1>
                <h2>Q1</h2>
                    <form method = "post" action = "/answer">
                    @csrf
                    <img src= "dakkusu.png" width="500" height="400">
                        <dd>              
                            <select name="Choose">
                                <option>選択してください</option>
                                <option value="dog">ミニチュアダックスフンド</option>
                                <option value="siba">柴犬</option>
                                <option value="buru">ブルドッグ</option>
                                <option value="hasu">ハスキー犬</option>
                            </select>
                                <input type = "submit">
                        </dd>
                    </form>
            </center>
        </body>
</html>
