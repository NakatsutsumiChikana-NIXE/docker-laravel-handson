<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


class Controller2 extends Controller
{
    public function index( Request $request , $test ) {
        //dd($test);
        return view ( 'welcome' , ['old'=>$test] );
    }

    public function manga() {
        return view('manga');
    }

    public function calc(Request $request) {
        return view ( 'calc');
    }

    public function total(Request $request){

        // 最初の値
        $num_1 = $request->box1;
        // プルダウン
        $num_2 = $request->box2;
        // 3番目の値
        $num_3 = $request->box3;
        
        $option = $_POST["select"];

        if( $option == "+"){

            $total = ( $request->box1 + $request->box3 );

        } elseif ( $option == "-" ) {

            $total = ( $request->box1 - $request->box3 );

        } elseif ($option == "*" ) {
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
        return view('total', $data);
    }

    public function quiz (Request $request){


        return view('quiz_dog');

    }

    public function answer_dog ( Request $request ) {

        $dog = $request->Choose;

       $answr = "";

        if($dog == "dog"){
            $answr= "正解！";
        } else {
            $answr = "不正解";
        }

    
        return view ('answer_dog',['answr'=>$answr]);
    }

    public function omikuji (Request $request){

        return view('omikuji');

    }

    public function omikuji_answer (Request $request){

        $random = rand(1,100);
        $rand = "";
        if($random == 14){
            $rand = "大吉";
        } elseif( $random <= 25){
            $rand = "中吉";
        }elseif( $random <= 45){
            $rand = "小吉";
        }elseif( $random <= 70){
            $rand = "吉";
        }elseif( $random <= 90){
            $rand = "末吉";
        } elseif ($random <= 97) {
            $rand = "凶";
        } elseif ($random <= 100) {
            $rand = "大凶";
        }


        return view('omikuji_answer',['random'=>$rand]);

    }

    public function blood_type (Request $request){
        return view('blood_type');

    }
    public function blood_type_answer (Request $request){

        $blood = $request->select_blood;
        if($blood=="A"){

        return view('blood_answerA');

        }elseif($blood=="B"){

        return view('blood_answerB');

        }elseif($blood=="O"){

            return view('blood_answerO');
        }elseif($blood=="AB"){

            return view('blood_answerAB');
        }


    }

    public function anime_title (Request $request){

        return view('anime_title');

    }

    public function title_name (Request $request){

        $random_1 = rand(1,10);
        $rand_1 = "";

        $random_2 = rand(1,10);
        $rand_2 = "";

        $random_3 = rand(1,10);
        $rand_3 = "";


        switch($random_1){
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

        switch($random_2){
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

        switch($random_3){
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


        return view('title_name',['rand_1'=>$rand_1, 'rand_2'=>$rand_2, 'rand_3'=>$rand_3]);

    }

    public function manga_top (Request $request){

        return view('manga_top');

    }

    public function manga_action (Request $request){

        $manga = $request->select_manga;
        if( $manga=="action"){

        return view('manga_action');

        }elseif($manga=="Everyday"){

        return view('manga_Everyday');

        }elseif($manga=="Sports"){

            return view('manga_Sports');
        }elseif($manga=="Entertainment"){

            return view('manga_Entertainment');
        }



    }
    public function dinner_menu (Request $request){

        return view('dinner_menu');

    }

    public function dinner_pork (Request $request){

        $rand_dinner = rand(1,3);
        $dinner_menu = $request->select_dinner;
        $dinner = "";

        switch($dinner_menu){
            case "pork":

                switch($rand_dinner){
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

                return view('dinner_pork',['dinner'=>$dinner]);

        } 

        switch($dinner_menu){
            case "Salmon":

                switch($rand_dinner){
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

                return view('dinner_Salmon',['dinner'=>$dinner]);
                
        } 

        switch($dinner_menu){
            case "cabbage":

                switch($rand_dinner){
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

                return view('dinner_cabbage',['dinner'=>$dinner]);
                
        } 
        
        switch($dinner_menu){
            case "chicken":

                switch($rand_dinner){
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

                return view('dinner_chicken',['dinner'=>$dinner]);
                
        } 


    }

    public function Lucky_color (Request $request){

        return view('Lucky_color');

    }

    public function Lucky (Request $request){

        $color = [
                    "赤","青","黄色","水色","オレンジ"
        ];
        $random = rand(0,count($color)-1);
        $color[$random];
        return view('Lucky',['color'=> $color[$random]]);

    }

    public function rpg_top (){

        return view('rpg_top');


    }

//RPG風

    public function rpg_fight (Request $request){

        $enemy_num = $request->select_enemy;//１回目選んだ敵の判定（プルダウンの値）
        //$my_hp = $request->my_hp;
        //$enemy_hp = $request->enemy_hp;
        $my_action = "";
        $enemy_action = "";

        if(isset ($request->select_enemy)) {
            $enemy_hps = [50,90,100,80];
            $enemy_hp = $enemy_hps[$enemy_num - 1];
            $enemy = null;
            $my_hp = 200;
        } else {
            $enemy = $request->enemy;//１回目以降選んだ敵の判定（プルダウンの値）
            $enemy_num = $request->enemy;
            $enemy_hp = $request->enemy_hp;
            $my_hp = $request->my_hp;

            if ($my_hp <= 0) {
                return view('rpg_game_over');
            }
            if ($enemy_hp <= 0) {
                return view('rpg_clear');     
            }
            

                //勇者の処理
                $enemy_hp_b = $request->enemy_hp;
                $enemy_rand = mt_rand(1,10);
                $enemy_attak_rand = mt_rand(1,30);
                if ($enemy_rand >= 1 && $enemy_rand <=5){
                    $my_action = "勇者がモンスターに".$enemy_attak_rand."ダメージ与えた";
                        $enemy_hp = $enemy_hp - $enemy_attak_rand;
                } elseif ($enemy_rand >= 6 && $enemy_rand <=9) {
                    $enemy_action = "モンスターが避けた";
                    $my_action = "勇者はダメージを与えられなかった";
                    $enemy_hp = $enemy_hp_b;
                } else {
                    $my_action = "クリティカル！！勇者がモンスターに100ダメージ与えた";
                        $enemy_hp = $enemy_hp - 100;
                }
                //敵の処理
                $my_hp_b = $request->my_hp;
                $my_rand = mt_rand(1,10);
                $my_attak_rand = mt_rand(1,30);
                if ($my_rand >= 1 && $my_rand <=5){
                    $enemy_action = "モンスターが勇者に".$my_attak_rand."ダメージ与えた";
                        $my_hp = $my_hp - $my_attak_rand;
                } elseif ($my_rand >= 6 && $my_rand <=9) {
                    $my_action = "勇者は避けた";
                    $enemy_action = "モンスターはダメージを与えられなかった";
                    $my_hp = $my_hp_b;
                } else {
                    $enemy_action = "クリティカル！！モンスターが勇者に100ダメージ与えた";
                        $my_hp = $my_hp - 100;
                }

        }

        
        

        $data = [
            'enemy_num'=>$enemy_num,
            'enemy'=>$enemy,
            'my_hp'=>$my_hp,
            'enemy_hp'=>$enemy_hp,
            'my_action'=>$my_action,
            "enemy_action"=>$enemy_action
        ];

        return view('rpg_fight',$data);

    }

}
