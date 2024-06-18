<?php

namespace App\Services\Administrator;

use App\Models\CafeAdministrator;
use App\Models\CareReviews;
use App\Services\RegistrationService;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response as StatusCode;

class ReviewsService
{

    // 表示させるレビューを探す
    public function searchReviews($baseData)
    {
        $careReviews = new CareReviews();

        $reviews = $careReviews->searchReviews();

        // レビューが一つも存在していなかった場合
        if ($reviews->isEmpty()) {
            return null;
        }

        return self::dataFormatting($reviews, $baseData);
    }

    // 表示に必要な値を整形する
    private function dataFormatting($reviews, $baseData)
    {
        $displayData = [];
        foreach ($reviews as $key => $review) {
            $info = $review->info;
            $levelOfSatisfaction = $info['levelOfSatisfaction'];

            $numOfStars = self::replaceSatisfactionWithStars($levelOfSatisfaction);

            // created_atが協定世界時間になっているから+9して日本時間にする
            $createdAt = Carbon::parse($review->created_at)->addHour(9);

            $userAndCommentId = $baseData['userId'] . '_' . $review->id;
            $displayData[$key]['deleteId'] = $userAndCommentId;
            $displayData[$key]['nickname'] = $info['nickname'];
            $displayData[$key]['reviewComment'] = nl2br($info['reviewComment']);
            $displayData[$key]['created_at'] = $createdAt;
            $displayData[$key]['numOfStars'] = $numOfStars;
        }

        return $displayData;
    }

    // 満足度を星マークへ変更
    private function replaceSatisfactionWithStars($levelOfSatisfaction)
    {
        switch ($levelOfSatisfaction) {
            case '1':
                return '⭐️';
                break;
            case '2':
                return '⭐️⭐️';
                break;
            case '3':
                return '⭐️⭐️⭐️';
                break;
            case '4':
                return '⭐️⭐️⭐️⭐️';
                break;
            default:
                return '⭐️⭐️⭐️⭐️⭐️';
                break;
        }
    }

    // 削除対象のデータを探す
    public function findReviewsToBeDeleted($baseData)
    {
        $formatId = explode('_', $baseData['deleteId']);
        $personToDelete = $formatId[0];
        $commentId = $formatId[1];

        // deleteIdが存在するということは、削除する対象ということ
        if (!empty($baseData['deleteId'] ?? '')) {
            $careReviews = new CareReviews();
            $deleteData = $careReviews->searchBasedOnCommentId($commentId);
            $formatData = self::formattingDataForDeletion($deleteData, $personToDelete);
            return $formatData;
        }
    }

    // 削除対象のデータを整形する
    private function formattingDataForDeletion(object $deleteData, $personToDelete)
    {
        $info = $deleteData->info;
        $deleteId = $personToDelete . '_' . $deleteData->id;
        $numOfStars = self::replaceSatisfactionWithStars($info['levelOfSatisfaction']);

        $formatData['userId'] = $personToDelete;
        $formatData['deleteId'] = $deleteId;
        $formatData['nickname'] = $info['nickname'];
        $formatData['reviewComment'] = $info['reviewComment'];
        $formatData['levelOfSatisfaction'] = $numOfStars;

        return $formatData;
    }

    // レビューを削除する
    public function reviewDelete($baseData)
    {
        $existingEmployees = self::employeeConfirmation($baseData['deletedBy'], $baseData['employeeId']);

        // ifの中に入るということは、社員名と社員IDが存在する
        if ($existingEmployees) {
            $formatId = explode('_', $baseData['startDelete']);
            $personToDelete = $formatId[0];
            $commentId = $formatId[1];

            $careReviews = new CareReviews();
            $baseReview = $careReviews->searchBasedOnCommentId($commentId);
            $newReview = $baseReview->replicate();
            $newInfo = self::creationInfo($baseReview, $baseData);

            $newReview->info = $newInfo;
            $newReview->save();
            $baseReview->delete();

            // 管理者画面の表示の時に必要なデータを取得
            $registrationService = new RegistrationService();
            $businessContacts = $registrationService->searchForBusinessContacts();
            $notices = $registrationService->searchForNotifications();

            return [
                'userId' => $personToDelete,
                'businessContacts' => $businessContacts,
                'notices' => $notices
            ];
        }

        return ['deleteId' => $baseData['startDelete']];
    }

    // 削除したい際になんで削除したかとかわかるようにする
    private function creationInfo($baseReview, $baseData)
    {
        // dd($baseReview);
        // dd($baseData);
        $baseInfo = $baseReview->info;
        $newInfo['nickname'] = $baseInfo['nickname'];
        $newInfo['reviewComment'] = $baseInfo['reviewComment'];
        $newInfo['levelOfSatisfaction'] = $baseInfo['levelOfSatisfaction'];
        $newInfo['deletedBy'] = $baseData['deletedBy'];
        $newInfo['employeeId'] = $baseData['employeeId'];
        $newInfo['reasonForDeletion'] = $baseData['reasonForDeletion'];

        return $newInfo;
    }

    // 社員IDとアカウント名が間違えないか確認
    private function employeeConfirmation($deletedBy, $employeeId)
    {
        $cafeAdministrator = new CafeAdministrator();
        $employeeInformation = $cafeAdministrator->searchIdAndNameMatch($employeeId, $deletedBy);

        if (is_null($employeeInformation)) {
            return false;
        }

        return true;
    }

    // 表示する削除済みレビュー
    public function viewDeletedReviews()
    {
        $careReviews = new CareReviews();
        $findDeletedData = $careReviews->findDeletedData();

        foreach ($findDeletedData as $key => $review) {
            $info = $review->info;
            $levelOfSatisfaction = $info['levelOfSatisfaction'];

            $numOfStars = self::replaceSatisfactionWithStars($levelOfSatisfaction);

            // created_atが協定世界時間になっているから+9して日本時間にする
            $createdAt = Carbon::parse($review->created_at)->addHour(9);

            // $newlineCodeReplacement = nl2br($info['reviewComment']);
            $displayData[$key]['nickname'] = $info['nickname'];
            $displayData[$key]['reviewComment'] = nl2br($info['reviewComment']);
            $displayData[$key]['deletedBy'] = $info['deletedBy'];
            $displayData[$key]['employeeId'] = $info['employeeId'];
            $displayData[$key]['reasonForDeletion'] = nl2br($info['reasonForDeletion']);
            $displayData[$key]['created_at'] = $createdAt;
            $displayData[$key]['numOfStars'] = $numOfStars;
        }

        return $displayData;
    }
}
