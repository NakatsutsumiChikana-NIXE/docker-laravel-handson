<?php

namespace App\Http\Controllers;

use App\Services\Customer\NewsService;
use App\Services\Customer\ReviewsService;
use Illuminate\Http\Request;

/**
 * テスト用ホームページ
 * カフェのホームページ
*/
class CafeController extends Controller
{
    // ホーム画面
    public function home()
    {
        return view('cafe/home');
    }

    // メニュー
    public function menu()
    {
        return view('cafe/menu');
    }

    // お知らせ
    public function news()
    {
        $newsService = new NewsService();
        $news = $newsService->displayedTargetNews();
        $nowDate = date("Y/m/d");
        return view('cafe/news', ['news' => $news, 'nowDate' => $nowDate]);
    }

    // アクセス方法
    public function access()
    {
        return view('cafe/access');
    }

    // 口コミ
    public function reviews(Request $request)
    {
        $allData = $request->all();
 
        $reviewsService = new ReviewsService();
        $reviews = $reviewsService->searchReviews($allData);

        return view('cafe/reviews', ['reviews' => $reviews]);
    }
}
