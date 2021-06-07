<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{

    Public function question_top (Request $request) {

                return view('question_top');
            

    }



    Public function question_create (Request $request) {

                return view('question_create');
            

    }

    Public function question_save (Request $request) {

        $questionModel = new Question;
        $saveData = $request->all();
        $questionModel = fill($saveData)->save();
        $questions = Question::orderBy('id', 'desc')->get();

        return view('question_top');


    }


    Public function question_page($id , Request $request) {

        switch($id) {
    
            case 1:
                $question_name = Question::where('id', $id)->value('question_name');
                $question_message = Question::where('id', $id)->value('question_message');
                $question_answer = Question::where('id', $id)->value('question_answer');
    
                $data = [

                        'question_name'=>$question_name ,
                        'question_message'=>$question_message ,
                        'question_answer'=>$question_answer

                ];
                return view('question_1', $data);
                break;
    }
    
    }
    
    
    public function question_answer ($id , Request $request) {

        $id = $request->id;
        $player_answer = $request->radio_box;
        $question_answer = $request->question_answer;
        $result_message = "";
    
        $count = 1;
    
        if($player_answer == $question_answer) {	
            $result_message = "正解";
    
        } else {
    
            $result_message = "不正解";
    
        }
    
        $data = [ 
            
            'result_message'=>$result_message
            
        ];
        
            return view('question_answer', $data);
    
        }
    
    
}