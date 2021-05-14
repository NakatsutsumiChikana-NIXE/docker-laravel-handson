<!DOCTYPE>
<html lang="ja">

    <head>
        <title>blood</title>
        <body bgcolor= #fffaf0>
            <center>
            <h1>　おすすめ漫画紹介</h1>
                   <form method = "post" action = /manga_action>
                    @csrf
                        <dd>
                            <select name="select_manga">
                                <option>選択してください</option>
                                <option value="action">アクション</option>
                                <option value="Everyday">ほのぼの</option>
                                <option value="Sports">スポーツ</option>
                                <option value="Entertainment">ギャグ</option>
                            </select>
                            <input type = "submit">
                        </dd>
                    </form>
            </center>
        </bocy>
    </head>
</html>
