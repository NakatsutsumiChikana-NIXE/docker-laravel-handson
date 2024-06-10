<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Services\RegistrationService;
use Illuminate\Http\Request;

class CafeAdministratorController extends Controller
{
    public function login()
    {
        return view('cafe/administrator/login', ['error' => '']);
    }

    // 最新情報ページに書き込む用のページ
    public function write(Request $request)
    {
        $registrationService = new RegistrationService();
        $checkLog = $registrationService->checkLog($request->all());

        // エラーがない場合は管理者画面へ
        if ($checkLog === true) {
            return view('cafe/administrator/administrator');
        }

        // エラーがある場合は、ログイン画面へエラー表示させる
        return view('cafe/administrator/login', ['error' => $checkLog['errMsgMortgages']]);
    }

    // アカウント作成
    public function create()
    {
        return view('cafe/administrator/create', ['error' => '']);
    }

    // 登録処理
    public function registration(Request $request)
    {
        $registrationService = new RegistrationService();
        $saveAccount = $registrationService->saveAccount($request);
        
        // エラーがない場合はログイン画面へ
        if ($saveAccount === true) {
            return view('cafe/administrator/login');
        }

        // エラーがある場合は、新規アカウント作成画面へ
        return view('cafe/administrator/create', ['error' => $saveAccount]);
    }
}
