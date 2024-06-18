<?php

namespace App\Services;

use App\Models\CafeAdministrator;
use App\Models\CafeNews;
use App\Services\RegistrationService;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\HttpFoundation\Response as StatusCode;

class NoticeService
{
    // 新規お知らせのセーブ
    public function noticeSave($request)
    {
        $baseData = $request->all();

        $userIdOfUpdater = $baseData['userData'];
        $cafeAdministrator = new CafeAdministrator();
        $userData = $cafeAdministrator->searchBasedOnId($userIdOfUpdater);

        // 保存対象の画像があるか
        if ($request->hasFile('image')) {
            // 画像保存
            $imagePath = $request->file('image')->store('uploads', 'public');
        }
        
        $info = self::createInfoData($userData, $baseData['newNotice'], $imagePath);

        $cafeNews = new CafeNews();
        $cafeNews->info = $info;
        $cafeNews->save();

        return ['userId' => $userIdOfUpdater];
    }

    // 新規お知らせのセーブデータを作成する
    private function createInfoData($userData, $newNotice, $imagePath)
    {
        // 投稿者
        $newInfo['author'] = $userData->name;
        // お知らせ内容
        $newInfo['noticeContent'] = $newNotice;
        // 投稿者の社員ID
        $newInfo['authorEmployeeId'] = $userData->employee_id;
        // アップされた画像
        $newInfo['image'] = $imagePath;

        return $newInfo;
    }

    // お知らせの編集対象を探す
    public function announceEditingUpcoming($baseData)
    {
        $formationData = explode("_", $baseData['userAndNoticeId']);
        $updaterEmployeeId = $formationData[0];
        $commentId = $formationData[1];

        $cafeNews = new CafeNews();
        $baseNotice = $cafeNews->searchBasedOnId($commentId);

        $cafeAdministrator = new CafeAdministrator();
        $userData = $cafeAdministrator->searchBasedOnId($updaterEmployeeId);

        $editId = $userData->employee_id . '_' . $commentId;

        return ['userId' => $updaterEmployeeId, 'editId' => $editId, 'noticeContent' => $baseNotice->info['noticeContent']];
    }

    // お知らせの編集
    public function noticeEdit($baseData)
    {
        $formationData = explode("_", $baseData['employeeAndNoticeId']);
        $updaterEmployeeId = $formationData[0];
        $commentId = $formationData[1];
        $updateComment = $baseData['editNotice'];

        $cafeNews = new CafeNews();
        $baseNotice = $cafeNews->searchBasedOnId($commentId);

        $cafeAdministrator = new CafeAdministrator();
        $dataOfChanger = $cafeAdministrator->searchBasedOnEmployeeId($updaterEmployeeId);

        $newInfo = self::editInfoDataCreation($baseNotice, $dataOfChanger, $updateComment);
        $baseNotice->info = $newInfo;
        $baseNotice->save();

        return [
            'userId' => $dataOfChanger->id,
            'editId' => $baseData['employeeAndNoticeId'],
            'noticeContent' => $newInfo['noticeContent']
        ];
    }

    // 編集時のinfoを作成
    private function editInfoDataCreation($baseNotice, $dataOfChanger, $updateComment)
    {
        $baseInfo = $baseNotice->info;
        $newInfo['author'] = $baseInfo['author'];
        $newInfo['noticeContent'] = $updateComment;
        $newInfo['authorEmployeeId'] = $dataOfChanger->employee_id;
        $newInfo['changer'] = $dataOfChanger->name;

        return $newInfo;
    }

    // 削除対象のお知らせを探す
    public function searchNoticeDelete($baseData)
    {
        $formationData = explode("_", $baseData['userIdAndDisplayId']);
        $updaterEmployeeId = $formationData[0];
        $commentId = $formationData[1];

        $cafeNews = new CafeNews();
        $baseNotice = $cafeNews->searchBasedOnId($commentId);
        $info = $baseNotice->info;

        $userAndCommentId = $updaterEmployeeId . '_' . $commentId;

        return [
            'userId' => $updaterEmployeeId,
            'userAndCommentId' => $userAndCommentId,
            'author' => $info['author'],
            'changer' => $info['changer'] ?? null,
            'noticeContent' => $info['noticeContent'],
            ];
    }

    // お知らせを削除する
    public function noticeDelete($baseData)
    {
        $formationData = explode("_", $baseData['deleteId']);
        $updaterEmployeeId = $formationData[0];
        $commentId = $formationData[1];

        $cafeNews = new CafeNews();
        $baseNotice = $cafeNews->searchBasedOnId($commentId);
        $baseNotice->delete();

        // 管理者画面の表示の時に必要なデータを取得
        $registrationService = new RegistrationService();
        $businessContacts = $registrationService->searchForBusinessContacts();
        $notices = $registrationService->searchForNotifications();

        return [
            'userId' => $updaterEmployeeId,
            'businessContacts' => $businessContacts,
            'notices' => $notices
        ];
    }

    // 現在ログインしているアカウントを探すことによって、更新・削除等動作させることのできるデータを求めることができる
    private function searchForLoginAccountBasedOnId($updaterEmployeeId)
    {
        $cafeAdministrator = new CafeAdministrator();
        $dataOfChanger = $cafeAdministrator->searchBasedOnId($updaterEmployeeId);
    }
}
