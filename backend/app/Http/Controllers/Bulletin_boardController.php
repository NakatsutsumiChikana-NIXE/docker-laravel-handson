<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Speak;
use Illuminate\Support\Facades\DB;

class Bulletin_boardController extends Controller
{
    public function bulletin_board(Request $request) {

        //$name = $request->name;
        //$contents = $request->contents;
        //$summary = $request->summary;
        //$psw = $request->password;

        // データベースからデータを取得してbladeに値を渡す
        $speaks = Speak::all();

        
        $data = [
        
            'speaks'=>$speaks

        ];
                return view('bulletin_board' , $data);
        
    }

        //ホームページで書き込まれた値を保存する
        public function save(Request $request){

            $psw = $request->psw;
            $name = $request->name;
            //dd($name);
            $contents = $request->contents;
            $rand = "";
            $comment = "";
            
            //何人コメント者がいるかのカウント
            $count = Speak::count();
            
            //新しいレコードの追加
            $speaksModel = new Speak;
            $saveData = $request->all();
            //〜多分現在の問題点〜
            $speaksModel->fill($saveData)->save();
            $speaks = Speak::orderBy('id', 'desc')->get();

            // データベースからデータを取得してbladeに値を渡す
            $speaks = Speak::all();
            //一定の数字お祝いメッセージ
            if(($count % 7) == 0){

                $comment = "おめでとうございます。{{$count}}番目のコメント入力者です。";

            } elseif(($count % 10) == 0) {

                $comment = "おめでとうございます。{{$count}}番目のコメント入力者です。";

            } else {

            }

            //おみくじ
            $random = rand(1,100);

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

            $request->validate([
                'image' => 'required|file|image|mimes:png,jpeg'
            ]);
            //<input type="file" name="image" />から渡される値を受け取る
            $upload_image = $request->file('image');
        
            if($upload_image) {
                //アップロードされた画像を保存する
                $path = $upload_image->store('uploads',"public");
                //画像の保存に成功したらDBに記録する
                if($path){
                    Speak::create([
                        "file_name" => $upload_image->getClientOriginalName(),
                        "file_path" => $path
                    ]);
                }
            }



            $data = [

                'speaks'=>$speaks ,
                'psw'=>$psw ,
                'name'=>$name ,
                'contents'=>$contents ,
                'rand'=>$rand ,
                'comment'=>$comment
    
            ];
            return view('verification' , $data);
        }
        //確認画面
        public function verification(Request $request){

            //新しいレコードの追加
            $speaksModel = new Speak;
            $saveData = $request->all();
            $speaksModel->fill($saveData)->save();
            $speaks = Speak::orderBy('id', 'desc')->get();
            $rand = "";
            $comment = "";
            // データベースからデータを取得してbladeに値を渡す
            $speaks = Speak::all();
            
            $psw = $request->psw;
            $name = $request->name;
            $contents = $request->contents;

    

            $data = [

                'speaks'=>$speaks ,
                'psw'=>$psw ,
                'name'=>$name ,
                'contents'=>$contents ,
                'rand'=>$rand ,
                'comment'=>$comment
    
            ];

            return view('verification' , $data);

            
        }
    
        //function uplopad(Request $request){
            //<input type="file" name="image" />を受け取る
            //return redirect("/list");
        
            
        //}
}
