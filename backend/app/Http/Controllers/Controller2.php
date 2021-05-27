<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class Controller2 extends Controller
{
    //ホームページ　トップページ
    public function index(Request $request) {

        //ページの管理のため必要
        $sort = $request->sort;
        //booksテーブルから5件取り出している
        $products = Book::paginate(5);

        $date = date('Y');
        $date_2 = date('m/d');
        // データベースからデータを取得してbladeに値を渡す
        $books = Book::all();

        $delete_id = $request->delete_id;
                
        $delete_psw = $request->delete_psw;

        $error= "";

        //IDとpswを取得
        $id = DB::table('books')->where('id', $delete_id )->value('id');
        $psw = DB::table('books')->where('id', $delete_id )->value('psw');

        if($id == $delete_id && $psw == $delete_psw) {

            Book::where( 'id', $delete_id )->delete();


        } elseif($id == $delete_id) {
            $error = "ID又はパスワードが間違っています。";
        } else {
            $error = "ID又はパスワードが違っています。";
        }


        $data = [
                    'books'=>$books ,
                    'date'=>$date , 
                    'date_2'=>$date_2 ,
                    'products'=>$products ,
                    'sort'=>$sort ,
                    'error'=>$error
                   
                ];
        return view('welcome', $data);
    }
    //新規作成ページ
    public function new(Request $request) {

        //ページの管理のため必要
        $sort = $request->sort;
        // データベースからデータを取得してbladeに値を渡す
        $books = Book::all();

        $data = [
                    'books'=>$books ,
                    'sort'=>$sort
                ];
        return view('new', $data);
    }

    //変更ページ
    public function change(Request $request) {

        //idの値を取得
        $chang_id = $request->id;
        //ページャーの値
        $page = $request->page;
        //エラーメッセージ



        $id = DB::table('books')->where('id', $chang_id)->value('id');//指定したメッセージのid
        $name = DB::table('books')->where('id', $chang_id)->value('name');//名前の値
        $contents = DB::table('books')->where('id', $chang_id)->value('contents');//コメントの値
        $summary = DB::table('books')->where('id', $chang_id)->value('summary');//お知らせの値

        $data = [
            'id'=>$id,
            'name'=>$name,
            'contents'=>$contents,
            'summary'=>$summary,
            'page'=>$page
        ];
        return view('change', $data);
    }

    //変更処理
    public function change_page(Request $request) {
        //idの値を取得
        $id = $request->id;
        //名前の値を取得
        $name = $request->name;
        //コメントの値を取得
        $contents = $request->contents;
        //お知らせの値を取得
        $summary = $request->summary;
        //ページャーの値
        $page = $request->page;
        //パスワードの値
        $delete_psw = $request->delete_psw;

        //エラーコメント
        $error = "";

        $date = date('Y');
        $date_2 = date('m/d');
       
        $psw = DB::table('books')->where('id', $id )->value('psw');//パスワードの値

        if($delete_psw == $psw) {

            if(isset($name)) {

                //データベースの変更
                DB::table('books')->where('id', $id)->update(['name' => $name]);//idの$id番目のデータを変更
    
            } else {
    
            }

            if(isset($contents)) {

                DB::table('books')->where('id', $id)->update(['contents' => $contents]);

            } else {

            }
            if(isset($summary)) {

                DB::table('books')->where('id', $id)->update(['summary' => $summary]);

            } else {

            }

        } else {

            $error = "パスワードが間違っているため変更できません";

        }


        
        //ページの管理のため必要
       // $sort = $request->sort;
        //booksテーブルから２件取り出している
        //$products = Book::paginate(5);
        
        //$error= "";
        

        $data = [

            'date'=>$date , 
            'date_2'=>$date_2 ,
            //'products'=>$products ,
            //'sort'=>$sort ,
            'error'=>$error ,
            'page'=>$page,
            'name'=>$name ,
            'contents'=>$contents ,
            'summary'=>$summary
            //compact('products')
        ];
        return view('change_answer', $data);

    }

        //変更した後の確認ページ
        public function change_ansewr(Request $request) {

            //idの値を取得
            $chang_id = $request->id;
            //ページャーの値
            $page = $request->page;
            //エラーコメント
            $error = "";
    
            $id = DB::table('books')->where('id', $chang_id)->value('id');//指定したメッセージのid
            $name = DB::table('books')->where('id', $chang_id)->value('name');//名前の値
            $contents = DB::table('books')->where('id', $chang_id)->value('contents');//コメントの値
            $summary = DB::table('books')->where('id', $chang_id)->value('summary');//お知らせの値
            $data = [
                'id'=>$id,
                'name'=>$name,
                'contents'=>$contents,
                'summary'=>$summary,
                'page'=>$page
            ];
            return view('change_answer',$data);
        }    




    //入力があっているのかの確認ページ
    public function bulletin(Request $request) {
        $name = $request->name;
        $contents = $request->contents;
        $summary = $request->summary;
        $psw = $request->password;
        

        $data = [

            'name'=>$name ,
            'contents'=>$contents ,
            'summary'=>$summary ,
            'psw'=>$psw
        ];
        return view('bulletin', $data);

    }


    

    //ホームページで書き込まれた値を保存する
    public function seve(Request $request){
        $date = date('Y');
        $date_2 = date('m/d');

        //ページの管理のため必要
        $sort = $request->sort;
        //booksテーブルから10件取り出している
         $products = Book::paginate(2);
        
        //新しいレコードの追加
        $booksModel = new Book;
        $saveData = $request->all();
        $booksModel->fill($saveData)->save();
        $books = Book::orderBy('id', 'desc')->get();
        $sort = $request->sort;
        $products = Book::paginate(3);

        $delete_id = $request->delete_id;
                
        $delete_psw = $request->delete_psw;

        $error= "";

        //IDとpswを取得
        $id = DB::table('books')->where('id', $delete_id )->value('id');
        $psw = DB::table('books')->where('id', $delete_id )->value('psw');

        if($id == $delete_id && $psw == $delete_psw) {

            Book::where( 'id', $delete_id )->delete();


        }elseif($id != $delete_id) {
            $error = "ID又はパスワードが間違っています。";
        }elseif($psw != $$delete_psw) {
            $error = "ID又はパスワードが違っています。";
        }


        $data = [

            'books'=>$books,
            'product'=>$products,
            'sort'=>$sort,
            'date'=>$date, 
            'date_2'=>$date_2,
            'products'=>$products ,
            'error'=>$error

        ];
        return view('welcome',$data);
    }


    //削除の処理
    public function delete(Request $request) {

                //ページの管理のため必要
                $sort = $request->sort;
                //booksテーブルから10件取り出している
                $products = Book::paginate(2);
                //日にち
                $date = date('Y');
                $date_2 = date('m/d');

                //newからのデータ
                $name = $request->name;
                $contents = $request->contents;
                $summary = $request->summary;
        
                //削除
                $delete_id = $request->delete_id;
                
                $delete_psw = $request->delete_psw;
                // データベースからデータを取得してbladeに値を渡す
                $books = Book::all();
                $error= "";

                //IDとpswを取得
                $id = DB::table('books')->where('id', $delete_id )->value('id');
                $psw = DB::table('books')->where('id', $delete_id )->value('psw');

                if($id == $delete_id && $psw == $delete_psw) {

                    Book::where( 'id', $delete_id )->delete();


                } elseif($id == $delete_id) {
                    $error = "ID又はパスワードが間違っています。";
                } else {
                    $error = "ID又はパスワードが違っています。";
                }

                $data = [
                    'books'=>$books ,
                    'date'=>$date , 
                    'date_2'=>$date_2 ,
                    'products'=>$products ,
                    'sort'=>$sort ,
                    'error'=>$error,
                    'summary'=>$summary ,
                    'contents'=>$contents ,
                    'name'=>$name

                ];

        
                return view('new_answer' , $data);
        

            }




    public function manga() {
        return view('manga');
    }


    public function total(Request $request) {

        // 最初の値
        $num_1 = $request->box1;
        // プルダウン
        $num_2 = $request->box2;
        // 3番目の値
        $num_3 = $request->box3;
        
        $option = $_POST["select"];

        if ( $option == "+") {

            $total = ( $request->box1 + $request->box3 );

        } elseif ( $option == "-" ) {

            $total = ( $request->box1 - $request->box3 );

        } elseif ( $option == "*" ) {
            $total = ( $request->box1 * $request->box3 );

        } elseif ( $option == "/" ) {

            $total = ( $request->box1 / $request->box3 );

        } else {

            $num_3 = " ";
            $total =  "計算できませんでした";

        }
        // 確認画面に表示する値を配列に格納する
        $data = [
            'box1' => $num_1,
            'box2' => $option,
            'box3' => $num_3,
            'total' => $total
        ];
        return view ( 'total', $data );
    }

    public function quiz ( Request $request ) {


        return view ( 'quiz_dog' );

    }

    public function answer_dog ( Request $request ) {

        $dog = $request->Choose;

       $answr = "";

        if ($dog == "dog") {
            $answr= "正解！";
        } else {
            $answr = "不正解";
        }

    
        return view ('answer_dog', [ 'answr'=>$answr ] );
    }

    public function omikuji ( Request $request ) {

        return view( 'omikuji' );

    }

    public function omikuji_answer ( Request $request ) {

        $random = rand(1,100);
        $rand = "";
        if ($random == 14) {

            $rand = "大吉";

        } elseif( $random <= 25) {

            $rand = "中吉";

        } elseif( $random <= 45) {

            $rand = "小吉";

        } elseif( $random <= 70) {

            $rand = "吉";

        } elseif( $random <= 90) {

            $rand = "末吉";

        } elseif ($random <= 97) {

            $rand = "凶";

        } elseif ($random <= 100) {

            $rand = "大凶";

        }


        return view('omikuji_answer', [ 'random'=>$rand ] );

    }

    public function blood_type (Request $request) {

        return view('blood_type');

    }
    public function blood_type_answer (Request $request) {

        $blood = $request->select_blood;
        if ($blood=="A") {

        return view('blood_answerA');

        } elseif ($blood=="B") {

        return view('blood_answerB');

        } elseif($blood=="O") {

            return view('blood_answerO');

        } elseif ($blood=="AB") {

            return view('blood_answerAB');
        }


    }

    public function anime_title (Request $request) {

        return view('anime_title');

    }

    public function title_name (Request $request) {

        $random_1 = rand(1,10);
        $rand_1 = "";

        $random_2 = rand(1,10);
        $rand_2 = "";

        $random_3 = rand(1,10);
        $rand_3 = "";


        switch ($random_1) {
            case 1:
                $rand_1 = "紅";
                break;
            case 2:
                $rand_1 = "となり";
                break;
            case 3:
                $rand_1 = "時を";
                break;
            case 4:
                $rand_1 = "鋼";
                break;
            case 5:
                $rand_1 = "バケモノ";
                break;
            case 6:
                $rand_1 = "天気";
                break;
            case 7:
                $rand_1 = "君";
                break;
            case 8:
                $rand_1 = "耳";
                break;
            case 9:
                $rand_1 = "ナルト";
                break;
            case 10 :
                $rand_1 = "宇宙";
                break;
            
        }

        switch ($random_2) {
            case 1:
                $rand_2 = "の";
                break;
            case 2:
                $rand_2 = "の";
                break;
            case 3:
                $rand_2 = "かける";
                break;
            case 4:
                $rand_2 = "の";
                break;
            case 5:
                $rand_2 = "の";
                break;
            case 6:
                $rand_2 = "の";
                break;
            case 7:
                $rand_2 = "の";
                break;
            case 8:
                $rand_2 = "を";
                break;
            case 9:
                $rand_2 = "疾風";
                break;
            case 10 :
                $rand_2 = "戦艦";
                break;
            
        }

        switch ($random_3) {
            case 1:
                $rand_3 = "豚";
                break;
            case 2:
                $rand_3 = "トトロ";
                break;
            case 3:
                $rand_3 = "少女";
                break;
            case 4:
                $rand_3 = "錬金術師";
                break;
            case 5:
                $rand_3 = "子";
                break;
            case 6:
                $rand_3 = "子";
                break;
            case 7:
                $rand_3 = "名は。";
                break;
            case 8:
                $rand_3 = "すませば";
                break;
            case 9:
                $rand_3 = "伝";
                break;
            case 10 :
                $rand_3 = "ヤマト";
                break;
            
        }


        return view('title_name', ['rand_1'=>$rand_1, 'rand_2'=>$rand_2, 'rand_3'=>$rand_3]);

    }

    public function manga_top (Request $request) {

        return view('manga_top');

    }

    public function manga_action (Request $request) {

        $manga = $request->select_manga;
        if( $manga=="action") {

        return view('manga_action');

        } elseif ($manga=="Everyday") {

        return view('manga_Everyday');

        } elseif ($manga=="Sports") {

            return view('manga_Sports');

        } elseif ($manga=="Entertainment") {

            return view('manga_Entertainment');
        }



    }
    public function dinner_menu (Request $request) {

        return view('dinner_menu');

    }

    public function dinner_pork (Request $request) {

        $rand_dinner = rand(1,3);
        $dinner_menu = $request->select_dinner;
        $dinner = "";

        switch ($dinner_menu) {
            case "pork":

                switch($rand_dinner) {
                    case 1:
                        $dinner = "肉じゃが";
                    break;

                    case 2:
                        $dinner = "カレーライス";
                    break;

                    case 3:
                        $dinner = "生姜焼き";
                    break;
                }

                return view('dinner_pork', ['dinner'=>$dinner]);

        } 

        switch ($dinner_menu) {
            case "Salmon":

                switch($rand_dinner) {
                    case 1:
                        $dinner = "ムニエル";
                    break;

                    case 2:
                        $dinner = "ホイル焼き";
                    break;

                    case 3:
                        $dinner = "鮭焼き";
                    break;
                }

                return view('dinner_Salmon', ['dinner'=>$dinner]);
                
        } 

        switch ($dinner_menu) {
            case "cabbage":

                switch ($rand_dinner) {
                    case 1:
                        $dinner = "やみつきキャベツ";
                    break;

                    case 2:
                        $dinner = "野菜炒め";
                    break;

                    case 3:
                        $dinner = "サラダ";
                    break;
                }

                return view('dinner_cabbage', ['dinner'=>$dinner]);
                
        } 
        
        switch ($dinner_menu) {
            case "chicken":

                switch ($rand_dinner){
                    case 1:
                        $dinner = "ソテー";
                    break;

                    case 2:
                        $dinner = "シチュー";
                    break;

                    case 3:
                        $dinner = "照り焼き";
                    break;
                }

                return view('dinner_chicken', ['dinner'=>$dinner]);
                
        } 


    }

    public function Lucky_color (Request $request) {

        return view('Lucky_color');

    }

    public function Lucky (Request $request) {

        $color = [
                    "赤","青","黄色","水色","オレンジ"
        ];
        $random = rand(0,count($color)-1);
        $color[$random];
        return view('Lucky',['color'=> $color[$random]]);

    }

    public function RPG_Top () {

        return view('RPG_Top');

    }

    public function RPG_fight (Request $request) {

        $enemy_num = $request->select_enemy;
        $my_hp = $request->my_hp;
        $enemy_hp = $request->enemy_hp;
        $my_action = "";
        $enemy_action = "";

        if (isset ($request->select_enemy)) {
            $enemy_hps = [50,90,100,80];
            $enemy_hp = $enemy_hps[$enemy_num];
            $my_hp = 200;
        }



        $battel_rand = rand(1,100);
        for ( $i==1; $i<=2; $i++) {
            if (1==$i) {

                if ($battel_rand <= 50) {

                    $my_action = $battel_rand."ダメージ与えた";
                    $enemy_hp = $enemy_hp - $battel_rand;
        
        
                } elseif ($battel_rand > 50 && $battel_rand <= 85) {
        
                    $my_action = "避けた";
        
                } elseif ($battel_rand > 85 && $battel_rand <= 100) {
        
                    $my_action = "100ダメージ与えた";
                }

            } else {
                if ($battel_rand <= 50){

                    $enemy_action = $battel_rand."ダメージ与えた";
                    $my_hp = $y_hp - $battel_rand;
        
        
                } elseif ($battel_rand > 50 && $battel_rand <= 85) {
        
                    $enemy_action = "避けた";
        
                } elseif ($battel_rand > 85 && $battel_rand <= 100) {
        
                    $enemy_action = "100ダメージ与えた";
                }
                
            }
            
        }
        if ($my_hp == null) {
            return view('game_over');
        }
        if ($enemy_hp == null) {
            return view('game_clear');     
        }
        

        $data = [
            'enemy_num'=>$enemy_num,
            'my_hp'=>$my_hp,
            'enemy_hp'=>$enemy_hp,
            'my_action'=>$my_action,
            "enemy_action"=>$enemy_action
        ];

        return view('RPG_fight', $data);

    }
//ホラー
    public function horror_top () {

        $count = 1;
        return view('horror_top', ["count" => $count]);
    }

    public function horror_route (Request $request) {

        $count = $request->count;
        $button_action = $request->route_button;
        $route_random = mt_rand(1,3);
        $ghost_random = mt_rand(1,10);

        //道で進んだ数をカウント
        $count++;
    
        $data = [
            "count" => $count
        ];

        if ($button_action == "右") {
            $button_action = 1;
        } elseif ($button_action == "中央") {
            $button_action = 2;
        } elseif ($button_action == "左") {
            $button_action = 3;
        }
        //道で選んだ番号とランダム処理があった場合の処理
        if ($button_action == $route_random) {

            return view('horror_danger', $data);

        }
        if ($count >= 6) {

            return view('horror_clear', $data);

        } else if (($count % 2) == 0) {

            return view('horror_route', $data);

        } else {

            return view('horror_danger', $data);

        }
        return view('horror_route', $data);

    }

    public function horror_danger (Request $request) {

        $count = $request->count;
        $ghost_random = mt_rand(1,10);
        if ($ghost_random >= 6) {
            return view('horror_route', ["count" => $count]);
        } else {
            return view ('horror_gameover');
        }

    }


}
