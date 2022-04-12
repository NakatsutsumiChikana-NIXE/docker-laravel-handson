<html lang="ja">

    <head>
        <title>horror_top</title>
    </head>
        <body bgcolor= #333333>
            <center>
                <h1 style="color:#ffffff">帰り道</h1>
                <div><img src = "/hora_9.png" width = "550" height = "450"></div>
            
                <form method = "post" action = "{{ route('horror_route') }}">
                    @csrf
                    <input type = "hidden" name = "count" value = "{{$count}}">
                    <input type = "submit" value = "スタート">
                </form>
                <audio controls loop src="bgm1.mp3"></audio>
            </center>
        </body>
</html>
