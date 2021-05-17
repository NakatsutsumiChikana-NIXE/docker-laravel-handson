<html lang="ja">

    <head>
        <title>horror_top</title>
        <body bgcolor= #fffaf0>
            <center>
            <h1>帰り道</h1>
            <div><img src = "hora_1.png" width = "200" height = "300"></div>
            
            <form method = "post" action = "horror_route">
                    @csrf
                <input type = "submit" value = "右">
             </form>

             <form method = "post" action = "horror_route">
                    @csrf
                <input type = "submit" value = "中央">
             </form>

             <form method = "post" action = "horror_route">
                    @csrf
                <input type = "submit" value = "左">
             </form>

            </center>
        </div>
        </body>
    </head>
</html>
