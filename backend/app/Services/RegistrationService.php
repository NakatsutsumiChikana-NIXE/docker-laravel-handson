<?php

namespace App\Services;

use App\Models\CafeAdministrator;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as StatusCode;

class RegistrationService
{
    public function saveAccount(object $targetData)
    {
        // CafeAdministratorモデルを呼び出す 変数作る;
        $cafeAdministrator = new CafeAdministrator();
        // 引数から必要な値を取得する
        $accountInfor = $targetData->all();
        // 社員IDを作成する →これはメソッドを作ってもいいかも (理由: 一つのメソッドで複数のことをやるのはあまり得策ではないから)
        $employeeId = self::createEmployeeId($accountInfor['birthday'], $accountInfor['sex']);
        // 取得した値をそれぞれ 変数へ入れる
        $cafeAdministrator->employee_id = $employeeId;
        $cafeAdministrator->name = $accountInfor['name'];

        $cafeAdministrator->birthday = $accountInfor['birthday'];
        $cafeAdministrator->sex = $accountInfor['sex'];
        // パスワードチェック
        $password = self::passwordCheck($accountInfor['password']);

        // パスワードが6桁以上入力されていたらエラー
        if (!empty($password['errMsgMortgages'] ?? '')) {
            return $password['errMsgMortgages'];
        }

        $cafeAdministrator->password = $password;
        $cafeAdministrator->save();
        return true;
    }

    // 社員ID作成
    private function createEmployeeId($birthday, $sex)
    {
        $dateSubdivision = explode("-", $birthday);
        // 社員IDは誕生日と性別を使って6桁0埋めで作成 sprintfで、できそうな気がする
        $baseEmployeeId = $dateSubdivision[1].$dateSubdivision[2].$sex.rand(1, 9);
        $employeeId = sprintf('%07d', $baseEmployeeId);
        return $employeeId;
    }

    // パスワードの確認
    private function passwordCheck($password)
    {
        if (mb_strlen($password) !== 6) {
            // $errMsgMortgages = 'パスワードは、6桁だ入力してください';
            return ['errMsgMortgages' => 'パスワードは、6桁で入力してください'];
        }

        return $password;
    }

    // ログインすることができるデータか確認
    public function checkLog($targetData)
    {
        $employeeId = $targetData['employee_id'];
        $accountName = $targetData['name'];
        $password = $targetData['password'];

        $cafeAdministrator = new CafeAdministrator();
        $loginData = $cafeAdministrator->searchForLoginData($employeeId, $accountName, $password);

        if (is_null($loginData)) {
            return ['errMsgMortgages' => '存在しないアカウントのようです。もう一度社員ID・アカウント名・パスワードを見直して入力し直してください'];
        }

        return true;
    }
}
