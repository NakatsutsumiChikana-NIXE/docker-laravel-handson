<html lang="ja">

    <head>
        <title>horror_route</title>
    </head>
        <body bgcolor= #333333>
            <center>
                <span>
                    <img src = "/hora_{{$count}}.png" width = "350" height = "550"></div>
                
                    <form method = "post" action = "{{ route ('horror_route') }}">
                         @csrf
                        <input type = "hidden" name = "count" value = "{{$count}}">
                        <input type = "submit" name="route_button" value = "右">
                        <input type = "submit" name="route_button" value = "中央">
                        <input type = "submit" name="route_button" value = "左">
                    </form>
                </span>
                <audio controls loop src="bgm1.mp3"></audio>
            </center>
        </body>
</html>
