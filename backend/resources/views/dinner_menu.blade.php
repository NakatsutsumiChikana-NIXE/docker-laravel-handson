<!DOCTYPE>
<html lang="ja">

    <head>
        <title>blood</title>
    </head>
        <body bgcolor= #fffaf0>
            <center>
            <h1>本日のご飯</h1>
            <p>冷蔵庫の中にある食材を選択してください</p>
                   <form method = "post" action = /dinner_pork>
                    @csrf
                        <dd>
                            <select name="select_dinner">
                                <option>選択してください</option>
                                <option value="pork">豚肉</option>
                                <option value="Salmon">鮭</option>
                                <option value="cabbage">キャベツ</option>
                                <option value="chicken">鶏肉</option>
                            </select>
                            <input type = "submit">
                        </dd>
                    </form>
                    <img src= "okazu.png" width="300" height="200">
            </center>
        </bocy>
</html>

