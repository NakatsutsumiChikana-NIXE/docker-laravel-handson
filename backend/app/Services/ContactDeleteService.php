<?php

namespace App\Services;

use App\Models\CafeContact;
use App\Services\RegistrationService;
use Symfony\Component\HttpFoundation\Response as StatusCode;

class ContactDeleteService
{
    // 削除対象のデータを探す
    public function searchForDataToDelete($variousId)
    {
        // deleteCommentIdが存在するということは、削除しても良いということ
        $formationData = explode("/", $variousId['userIdAndDisplayId']);
        $userId = $formationData[0];
        $commentId = $formationData[1];
        $cafeContact = new CafeContact();
        $dataToBeDeleted = $cafeContact->searchBasedOnId($commentId);
        $deleteInfo = $dataToBeDeleted->info;
        $screenDisplayData = [
            'userId' => $userId,
            'commentId' => $dataToBeDeleted->id,
            'author' => $deleteInfo['author'],
            'changer' => $deleteInfo['changer'] ?? null,
            'businessContact' => $deleteInfo['businessContact'],
            'authorEmployeeId' => $deleteInfo['authorEmployeeId'],
        ];

        return $screenDisplayData;
    }

    // 業務連絡の削除
    public function deleteTargetData($userAndCommentId)
    {
        try {
            // 渡されたユーザーIDとコメントIDを求める
            $formationData = explode("_", $userAndCommentId);
            $userId = $formationData[0];
            $commentId = $formationData[1];

            $cafeContact = new CafeContact();
            $deleteData = $cafeContact->searchBasedOnId($commentId);
            $deleteData->delete();

            // 管理者画面の表示の時に必要なデータを取得
            $registrationService = new RegistrationService();
            $businessContacts = $registrationService->searchForBusinessContacts();
            $notice =  $registrationService->searchForNotifications();
            $displayData = ['userId' => $userId, 'businessContacts' => $businessContacts, 'notices' => $notice];

            return $displayData;
        } catch (\Exception $e) {
        }
    }
}
