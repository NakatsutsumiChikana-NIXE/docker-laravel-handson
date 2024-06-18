<?php

namespace App\Services\Customer;

use App\Models\CafeNews;
use Symfony\Component\HttpFoundation\Response as StatusCode;

class NewsService
{
    public function displayedTargetNews()
    {
        $cafeNews = new CafeNews();
        $baseNews = $cafeNews->getNotice();

        if (is_null($baseNews)) {
            return '';
        }

        $news = self::formatNewsData($baseNews);

        return $news;
    }

    // お知らせのデータを整形する
    private function formatNewsData($baseNews)
    {
        $news = [];

        foreach ($baseNews as $key => $display) {
            $info = $display->info;

            $newlineCodeReplacement = nl2br($info['noticeContent']);
            $formatData[$key]['noticeContent'] = $newlineCodeReplacement;
            $formatData[$key]['image'] = $info['image'] ?? '';
            $formatData[$key]['created_at'] = $display->created_at->format('Y/m/d');
            $news = $formatData;
        }

        return $news;
    }
}
