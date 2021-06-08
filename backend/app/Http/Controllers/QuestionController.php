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

            $create_id = $request->create_id;
            $contents = $request->contents;
            $message = $request->message;


        $data = [

            'count'=>$count

        ];


                return view('question_create', $data);
            

    }
//編集
    Public function question_edit (Request $request) {

        $create_id = $request->create_id;
        $contents = $request->contents;
        $message = $request->message;
        $answer = $request->answer;

        Question::where('id', $create_id)->update(['contents'=>$contents]);
        Question::where('id', $create_id)->update(['message'=>$message]);



        $data = [

            'create_id'=>$create_id,
            'contents'=>$contents,
            'message'=>$message,
            'answer'=>$answer
        ];

        return view('question_edit', $data);
    }


    Public function question_save (Request $request) {

        $questionModel = new Question;
        $saveData = $request->all();
        $questionModel->fill($saveData)->save();
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
        $correct_count = 0;
    
        if ($answer == $gender) {	

            $result_message = "正解";
            $correct_count = $correct_count+1;
    
        } else {
    
            $result_message = "不正解";
    
        }
    
        $data = [ 
            
            'result_message'=>$result_message,
            'correct_count'=>$correct_count
            
        ];
        
            return view('question_answer', $data);
    
        }
        //正解率
        Public function correct_answer_rate (Request $request) {
            $answer = $request->answer;
            $correct_count = $request->corect_count;

            $ccorrect_answer_rate = $correct_count * 10;

            $data = [

                'ccorrect_answer_rate'=>$ccorrect_answer_rate

            ];



            return view('correct_answer_rate', $data);
    
    
        }
        //問題一覧
        Public function question_production_verification (Request $request) {
            $answer = $request->answer;

            $id = $request->id;
            $contets = $request->contets;
            $message = $request->message;

            Question::where('id', $id)->update(['contents'=>$contets]);
            Question::where('id', $id)->update(['message'=>$message]);
            Question::where('id', $id)->update(['answer'=>$answer]);

            $questions = Question::orderBy('id', 'desc')->get();

            $data = [
                'questions'=>$questions
            ];



            return view('question_production_verification', $data);
    
    
        }


        
    

    
    
    
}