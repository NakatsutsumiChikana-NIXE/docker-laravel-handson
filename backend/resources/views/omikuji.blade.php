<!DOCTYPE>
<html lang="ja">

    <head>
        <title>quiz</title>
        <body bgcolor= #ffffe0>
        <center>
            <h1>おみくじ</h1>
                <div align="right">
                    <img src= "omikuji.png" width="200" height="100">
                </div>
                <form method = "post" action = "omikuji_answer">
                @csrf
                            <input type = "submit">
                </form>
                
        </center>
            

        </body>
    </head>
</html>
