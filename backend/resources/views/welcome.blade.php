<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Nakatsutsumi　Self-infroduction</title>
        <meta name="viweport" content="width=device-width,initial-scale=1">
        <style>

            @media screen and (max-width: 480px) {

                p {
                    color : #fd0000;
                }

                ul {
                        padding: 0;
                        width: 301px;     /* 3列分の幅+borderの1px */
                        height: 201px;    /* 4行分の高さ+borderの1px */
                        border-top: solid 1px #000;
                        border-left: solid 1px #000;
                        display: flex;
                        flex-direction: column;  /* 並び順を縦方向に変更 */
                        flex-wrap: wrap;         /* 折返し */
                    }

                ul li {
                        list-style: none;
                        width: 150px;
                        height: 40px;
                        border-bottom: solid 1px #000;
                        border-right: solid 1px #000;
                        box-sizing: border-box;
                        padding: 0 10px;
                        display: flex;
                        align-items: center;    /* 文字を上下中央にする */
                     }

            }
            @media screen and (min-width: 480px) and ( max-width:1440px){

                ul {
                        padding: 0;
                        width: 451px;     /* 3列分の幅+borderの1px */
                        height: 161px;    /* 4行分の高さ+borderの1px */
                        border-top: solid 1px #000;
                        border-left: solid 1px #000;
                        display: flex;
                        flex-direction: column;  /* 並び順を縦方向に変更 */
                        flex-wrap: wrap;         /* 折返し */
                    }

                ul li {
                        list-style: none;
                        width: 150px;
                        height: 40px;
                        border-bottom: solid 1px #000;
                        border-right: solid 1px #000;
                        box-sizing: border-box;
                        padding: 0 10px;
                        display: flex;
                        align-items: center;    /* 文字を上下中央にする */
                     }


             }

            body {
                    background-color: #6495ed; 
                }

                .box1 {
                        width: 900px;
                        padding: 0.2em 0.5em;
                        margin: 2em 0;
                        background: #d6ebff;
                        box-shadow: 0px 0px 0px 10px #d6ebff;
                        border: dashed 2px white;
                    }

                .box2 {
                        margin: 2em 0;
                        background: #dcefff;
                    }

                .box2 .box-title {
                                    font-size: 1.2em;
                                    background: #5fb3f5;
                                    padding: 4px;
                                    text-align: center;
                                    color: #FFF;
                                    font-weight: bold;
                                    letter-spacing: 0.05em;
                                }
                .box3{

                    width: 400px;
                    display: inline-block;
                    padding: 5psx 10px;
                    border: dashed #ffffff;

                }

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
                            height:90px;
                            overflow:scroll;
                            overflow-x:hidden;

                        }

                .post-date {
                    
                    background: #0bd;
                    border-radius: 50%;
                    color: #fff;
                    width: 100px;
                    height: 80px;
                    font-size: 1.510rem;
                    text-align: center;
                    position: absolute;
                    top: 0;
                    padding-top: 10px;

                }

                .post-date span {
                    
                    font-size: 1rem;
                    border-top: 1px rgba(255,255,255,.5) solid;
                    padding-top: 6px;
                    display: block;
                    width: 60%;
                    margin: 0 auto;
                }

                .pager_1 {
                    width: 50;
                    height: 30;
                }


        </style>
    </head>
        <body>
            <p class="post-date">{{$date_2}} <span>{{$date}}</span></p>
            <center>
                <div class="box1">
                    <h1>自己紹介</h1>
                </div>
                <div class = "box3">
                    <h2>名前</h2>
                </div>
                <p>中堤　智翔奈(なかつつみ　ちかな)</p>
                <div class = "box3">
                    <h2>誕生日</h2>
                </div>
                <p>5月26日</p>
                <div class = "box3">
                    <h2>血液型</h2>
                </div>
                <p>A型</p>
                <div class = "box3">
                    <h2>出身地</h2>
                </div>
                <p>青森県八戸市</p>
                <div class = "box3">
                    <h2>好きな色</h2>
                </div>
                <p>青（寒色）</p>
                <div class = "box3">
                    <h2>好きな食べ物</h2>
                </div>
                <p>オムライス</p>
                <img src= "omuraisu.png" width="200" height="100"><br>
                <br>
                <div class = "box3">
                    <h2>好きな動物</h2>
                </div>
                <p>犬</p>
                    <img src="PANTI.jpg"width="300" height="200" alt=""><br>
                    <br>
                    <div class = "box3">
                        <h2>趣味・特技</h2>
                    </div>
                    <p>・プラモ作成</p>
                    <p>・漫画を読む </p>
                    <p>・アニメ・DVD鑑賞</p>
                    <p>・音楽を聞くこと（J-POP,クラシック、アニソン　など）</p>
                    <p>・剣道</p>

                    <div class="box2">
                    <div class="box-title">一言コメント</div>
                    <strong><p>
                            少々人見知りな部分もありますがお話などするのは好きなので<br>
                            是非声をかけていただけると嬉しいです！<br>
                            まだまだ未熟者ですがこれから色々覚えていって<br>
                            少しでも早く皆さんの役に立てるようにしたいと思いますので                            
                            ご指導よろしくお願いします。<br>
                        </p></strong>

                    </div>
                <ul>
                    <li>1.りんご</li>
                    <li>2.バナナ</li>
                    <li>3.いちご</li>
                    <li>4.スイカ</li>
                    <li>5.なし</li>
                    <li>6.もも</li>
                    <li>7.かき</li>
                    <li>8.メロン</li>
                    <li>9.ぶどう</li>
                    <li>10.さくらんぼ</li>
                </ul>

            </center>
            <h3>新規作成は下のボタンを押してください</h3>
            <p>↓</p>
            <form method = "get" action = "new">
                    @csrf
                    <button type = "submit">新規</button>
                </form>


                <br>
                <p>削除処理</p>
                <br>
                <form method = "post" action = "{{ route('delete')}}">
                    @csrf
                    <p>IDを入力してください：<input type = "integer" name = "delete_id"></p>
                    <p>パスワードを入力してください：<input type = "integer" name = "delete_psw"></p>
                    <button type = "submit">削除</button>
                </form>

            <center>
                <div class="box4">
                    <div class="box-title_1">データベースから取得した値</div>
                        <div class ="scroll">
                            @foreach ($products as $book)
                                <form method = "get" action = "change">
                                    @csrf
                                <!--nameが名前、contentsがコメント、summaryが、お知らせ-->
                                    <p>ID　{{ $book->id }} : {{ $book->name }} / {{ $book->contents }} / {{$book->summary}}　<button type = "submit">変更</button></p>
                                    <input type = "hidden" name = "id" value = "{{ $book->id }}">
                                    <input type = "hidden" name = "page" value = "{{$products->currentPage()}}">
                                </form>
                            @endforeach

                        </div>
                    </div>
                    <p>現在{{$products->currentPage()}}ページです</p>
                    {{$error}}
                    <!--現在いるページャーを取得-->
                    <div class="pager_1">
                        {{$products->links()}}
                </div>
            </center>
            
            <a href="{{route('manga')}}"><img src="bakuman.jpg" alt="クリック"></a>
            <p>↑押すと漫画おすすめへ移動</p>
            
        </body>
</html>
