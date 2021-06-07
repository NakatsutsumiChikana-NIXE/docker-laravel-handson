<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{

    Public function question_top (Request $request) {

        $count = 1;
        $data = [

            'count'=>$count

        ];
        
        return view('question_top', $data);
            

    }



    Public function question_create (Request $request) {

        $count = $request->count;

        $data = [

            'count'=>$count

        ];


                return view('question_create', $data);
            

    }

    Public function question_save (Request $request) {

        $questionModel = new Question;
        $saveData = $request->all();
        $questionModel->fill($saveData)->save();
        $questions = Question::orderBy('id', 'desc')->get();

        return view('question_top');


    }


    Public function question_display(Request $request) {

        $count = $request->count;
        $answer = $request->answer;

        
        if ($count <= 10) {

            $contents = Question::where('id', $count)->value('contents');
            $message = Question::where('id', $count)->value('message');
            $answer = Question::where('id', $count)->value('answer');

            $data = [

                    'contents'=>$contents ,
                    'message'=>$message ,
                    'answer'=>$answer,
                    'count'=>$count

            ];

            return view('question_display', $data);

        } else {

            return view('correct_answer_rate');
            
        }
    
    }
    
    
    public function question_answer ( Request $request) {

        $answer = $request->answer;
        $result_message = "";
        $gender = $request->gender;

    
        $count = 1;
    
        if ($answer == $gender) {	

            $result_message = "正解";
    
        } else {
    
            $result_message = "不正解";
    
        }
    
        $data = [ 
            
            'result_message'=>$result_message
            
        ];
        
            return view('question_answer', $data);
    
        }

        Public function correct_answer_rate (Request $request) {
            $answer = $request->answer;

            $data = [


            ];



            return view('correct_answer_rate');
    
    
        }
    
    
    
}