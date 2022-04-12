<html lang="ja">

    <head>
        <title>Lucky_color</title>
        <body bgcolor= #fffaf0>
            <center>
            <img src = "/enemy{{$enemy_num}}.png" width = "200" height = "300">
            <form method = "post" action = "/rpg_fight" >
                    @csrf
                    <div>
                        <p>{{$my_action}}</p>
                        <p>{{$enemy_action}}</p>
                    </div>
                    <br>
                    <br>
                    <p>勇者のHP{{$my_hp}}</p>
                    <p>モンスターのHP{{$enemy_hp}}</p>
                <input type = "hidden" name = "enemy" value = "{{$enemy_num}}">
                <input type = "hidden" name = "my_hp" value = "{{$my_hp}}">
                <input type = "hidden" name = "enemy_hp" value = "{{$enemy_hp}}">

                <input type = "submit" value = "次のターンへ">
            </form>

            </center>
        </div>
        </body>
    </head>
</html>
