<!DOCTYPE>
<html lang="ja">
    <head>
        <title>new bulletin_board</title>
        <meta name="viweport" content="width=device-width,initial-scale=1">
        <style>
            @media screen and (min-width: 480px) and ( max-width:1440px){

                .box4 {

                        width: 408px;
                        margin: 2em 0;
                        background: #dcefff;

                }

                .box4 .box-title_1 {
                    width: 400px;
                    font-size: 1.2em;
                    background: #000080;
                    padding: 4px;
                    text-align: center;
                    color: #FFF;
                    font-weight: bold;
                    letter-spacing: 0.05em;
                }

                .scroll {

                            width:400px;
                            height:130px;
                            overflow:scroll;
                            overflow-x:hidden;

                        }

            }
        </style>


    </head>
        <body bgcolor= #fffaf0>
            <center>
                <h1>New掲示板</h1>

                <form method = "post" action = "{{ route('save') }}"  enctype = "multipart/form-data">
                    @csrf
                    <p>　　名前：<input type = "text" name = "name"></p>
                    <p>パスワード：<input type = "integer" name = "psw"></p>
                    <p>コメント：<textarea type = "text" name = "contents" ></textarea></p>
                    <input type="file" name="image" accept="image/png, image/jpeg">
                    <button type="submit">送信</button>
                </form>
                <div class="box4">
                    <div class="box-title_1">データベースから取得した値</div>
                        <div class ="scroll">
                            @foreach ($speaks as $speak)
                                <!---@csrf-->
                                <!--nameが名前、contentsがコメント-->
                                <p>ID　{{$speak->id}} :{{$speak->name}}さんのコメント </p>
                                <p>  {{$speak->contents}}とコメントしました。</p>
                                <p>投稿日：{{$speak->created_at }} </p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--</form>-->
            </center>

        </body>
</html>
