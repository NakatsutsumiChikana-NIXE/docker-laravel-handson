<?php

namespace App\Services\Customer;

use App\Models\CareReviews;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response as StatusCode;

class ReviewsService
{
    // 表示させるレビューを探す
    public function searchReviews($baseData)
    {
        $nickname = $baseData['nickname'] ?? '';
        $careReviews = new CareReviews();

        // nicknameが存在するということはレビューを記載しているので保存対象
        if (!empty($nickname)) {
            self::reviewsSave($baseData, $careReviews);
        }

        $reviews = $careReviews->searchReviews();

        // レビューが一つも存在していなかった場合
        if ($reviews->isEmpty()) {
            return null;
        }

        $displayData = self::dataFormatting($reviews);

        return $displayData;
    }

    // レビュー内容を保存
    private function reviewsSave($baseData, $careReviews)
    {
        $review['nickname'] = $baseData['nickname'];
        $review['reviewComment'] = $baseData['reviewComment'];
        $review['levelOfSatisfaction'] = $baseData['levelOfSatisfaction'];
        $careReviews->info = $review;
        $careReviews->save();

        return;
    }

    // 表示に必要な値を整形する
    private function dataFormatting($reviews)
    {
        $displayData = [];
        foreach ($reviews as $key => $review) {
            $info = $review->info;
            $levelOfSatisfaction = $info['levelOfSatisfaction'];

            switch ($levelOfSatisfaction) {
                case '1':
                    $numOfStars = '⭐️';
                    break;
                case '2':
                    $numOfStars = '⭐️⭐️';
                    break;
                case '3':
                    $numOfStars = '⭐️⭐️⭐️';
                    break;
                case '4':
                    $numOfStars = '⭐️⭐️⭐️⭐️';
                    break;
                default:
                    $numOfStars = '⭐️⭐️⭐️⭐️⭐️';
                    break;
            }

            // created_atが協定世界時間になっているから+9して日本時間にする
            $createdAt = Carbon::parse($review->created_at)->addHour(9);

            $displayData[$key]['nickname'] = $info['nickname'];
            $displayData[$key]['reviewComment'] = nl2br($info['reviewComment']);
            $displayData[$key]['created_at'] = $createdAt;
            $displayData[$key]['numOfStars'] = $numOfStars;
        }

        return $displayData;
    }
}
