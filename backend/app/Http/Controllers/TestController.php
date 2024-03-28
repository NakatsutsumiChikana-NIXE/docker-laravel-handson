<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;

class TestController extends Controller
{
    public function test(Request $request){
        return view('validate_test', ['msg'=>'入力してください']);
    }

    public function post(TestRequest $request){

        return view('validate_test', ['msg'=>'正しく入力されました。']);
    }
}
