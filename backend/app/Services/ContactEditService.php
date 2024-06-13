<?php

namespace App\Services;

use App\Models\CafeAdministrator;
use App\Models\CafeContact;
use Symfony\Component\HttpFoundation\Response as StatusCode;

class ContactEditService
{
    public function searchForEditedData($sourceOfSearch)
    {
        // editContactがあるということは編集するコメントがあるということなので、編集してsave処理を実行する
        if (!empty($sourceOfSearch['editContact'] ?? '')) {
            return self::saveEditContact($sourceOfSearch);
        }

        $userAndCommentId = $sourceOfSearch['id'];
        $formationData = explode("/", $userAndCommentId);
        $userId = $formationData[0];
        $commentId = $formationData[1];

        $cafeContact = new CafeContact();
        // 編集対象コメント
        $targetComment = $cafeContact->searchBasedOnId($commentId);
        $cafeAdministrator = new CafeAdministrator();
        $updaterData = $cafeAdministrator->searchBasedOnId($userId);

        $editId = $updaterData['employee_id'] . '_' . $commentId;
        $requiredData = [$targetComment->info['businessContact'], $editId, $userId];

        return $requiredData;
    }

    // 編集した業務連絡保存
    private function saveEditContact($sourceOfSearch)
    {
        try {
            $formationData = explode("_", $sourceOfSearch['userData']);
            $updaterEmployeeId = $formationData[0];
            $commentId = $formationData[1];
            $updateComment = $sourceOfSearch['editContact'];

            $cafeContact = new CafeContact();
            $dataToBeUpdated = $cafeContact->searchBasedOnId($commentId);

            $cafeAdministrator = new CafeAdministrator();
            $updaterInfo = $cafeAdministrator->searchBasedOnEmployeeId($updaterEmployeeId);

            $shapingInfoData = self::saveDataFormation($dataToBeUpdated, $updaterInfo, $updateComment);
            $dataToBeUpdated->info = $shapingInfoData;
            $dataToBeUpdated->save();

            $editId = $updaterInfo->employee_id. '_' . $commentId;

            $requiredData = [$shapingInfoData['businessContact'], $editId, $updaterInfo->id];
            return $requiredData;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    // セーブ対象の編集データを整形
    private function saveDataFormation($dataToBeUpdated, $updaterInfo, $updateComment)
    {
        $baseInfo = $dataToBeUpdated->info;
        $editInfo['author'] = $baseInfo['author'];
        $editInfo['businessContact'] = $updateComment;
        $editInfo['authorEmployeeId'] = $updaterInfo['employee_id'];
        $editInfo['changer'] = $updaterInfo['name'];

        return $editInfo;
    }
}
