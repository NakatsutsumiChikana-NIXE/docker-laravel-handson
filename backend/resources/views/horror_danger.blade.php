<html lang="ja">

    <head>
        <title>horror_danger</title>
        <body bgcolor= #333333>
            <center>
            <div><img src = "/hora_6.png" width = "350" height = "550"></div>
            
            <form method = "post" action = "{{ route('horror_danger') }}">
                    @csrf
                    <input type = "hidden" name = "count" value = "{{$count}}">
                <input type = "submit" value = "逃げる">
             </form>
             <audio controls loop src="bgm2.mp3"></audio>
            </center>
        </div>
        </body>
    </head>
</html>
