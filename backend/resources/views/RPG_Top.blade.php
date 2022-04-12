<html lang="ja">

    <head>
        <title>Lucky_color</title>
        <body bgcolor= #fffaf0>
            <center>
            <span><img src = "enemy1.png" width = "200" height = "300"><img src = "enemy2.png"width = "200" height = "300">
            <img src = "enemy3.png"width = "200" height = "300"><img src = "enemy4.png"width = "200" height = "300"></span>
            <form method = "post" action = "/rpg_fight">
                    @csrf
                        <dd>
                            <select name="select_enemy">
                                <option value="1">スライム</option>
                                <option value="2">九尾</option>
                                <option value="3">ゴーレム</option>
                                <option value="4">ゴースト</option>
                            </select>
                            <input type = "submit" value = "戦闘開始！">
                        </dd>
                    </form>

            </center>
        </div>
        </body>
    </head>
</html>
