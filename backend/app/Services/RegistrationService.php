<?php

namespace App\Services;

use App\Models\CafeAdministrator;
use App\Models\CafeContact;
use App\Models\CafeNews;
use Symfony\Component\HttpFoundation\Response as StatusCode;

class RegistrationService
{
    public function saveAccount(object $targetData)
    {
        $cafeAdministrator = new CafeAdministrator();
        $accountInfor = $targetData->all();
        // 社員IDを作成
        $employeeId = self::createEmployeeId($accountInfor['birthday'], $accountInfor['sex']);
        // 名前と社員IDが一致していたら困るので一致しているデータがあるか見る
        $existingData = $cafeAdministrator->searchIdAndNameMatch($employeeId, $accountInfor['name']);

        // nullじゃないということは名前と社員IDが一致しているデータが存在するということ
        if (isset($existingData)) {
            $employeeId = self::createEmployeeId($accountInfor['birthday'], $accountInfor['sex']);
            // 名前と社員IDが一致していたら困るので一致しているデータがあるか見る
            $existingData = $cafeAdministrator->searchIdAndNameMatch($employeeId, $accountInfor['name']);
        }

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
    public function createEmployeeId($birthday, $sex)
    {
        $dateSubdivision = explode("-", $birthday);
        // 社員IDは誕生日と性別を使って作成
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
        $loginData = $cafeAdministrator->searchData($employeeId, $accountName, $password);

        if (is_null($loginData)) {
            return ['errMsgMortgages' => '存在しないアカウントのようです。もう一度社員ID・アカウント名・パスワードを見直して入力し直してください'];
        }

        return true;
    }

    // ユーザーを探してユーザー情報を取得してくる
    public function searchForUsers($targetId)
    {
        $cafeAdministrator = new CafeAdministrator();
        $userData = $cafeAdministrator->searchBasedOnId($targetId);
        $dataToPass = [
            'employee_id' => $userData['employee_id'],
            'name' => $userData['name'],
            'password' => $userData['password'],
        ];

        return $dataToPass;
    }

    // 業務連絡のデータを探す
    public function searchForBusinessContacts()
    {
        $cafeContact = new CafeContact;
        $businessCommunications = $cafeContact->getBusinessCommunications();

        // 一度もデータを保存したことがない場合は空文字を入れてあげる
        if (is_null($businessCommunications)) {
            $businessCommunications = '';
        }

        return collect($businessCommunications);
    }

    // お知らせ内容を探す
    public function searchForNotifications()
    {
        $cafeNews = new CafeNews;
        $notice = $cafeNews->getNotice();

        if (is_null($notice)) {
            $notice = '';
        }

        return collect($notice);
    }

    // bladeに渡すデータ作る
    public function createData($userData)
    {
        $employeeId = $userData['employee_id'];
        $accountName = $userData['name'];
        $password = $userData['password'];

        $cafeAdministrator = new CafeAdministrator();
        $loginData = $cafeAdministrator->searchData($employeeId, $accountName, $password);

        return $loginData->id;
    }
}
