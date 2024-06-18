<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>レビュー</title>
    <link rel="stylesheet" href="{{ asset('/css/cafe/menu-bar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/cafe/reviews.css') }}">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<header>
    <x-index.cafe-menu-bar />
</header>
    <body>
        <div>
            <div class="text-center">
                <div class="news-border">
                    <h1 class="mt-3 page-title">みんなのレビュー</h1>
                </div>
            </div>
            <div>
                @include('layout.reviews', ['reviews' => $reviews])
            </div>
            <form id="reviewForm" method="post" action="/cafe_reviews">
                @csrf
                <div class="left-and-right-margin write-box">
                    <div class="mb-3">
                        <h3>レビュー書き込み</h3>
                    </div>
                    <div class="mb-3 review-flex">
                        <label for="nickname" class="label-width">ニックネーム：</label>
                        <input type="text" id="nickname" name="nickname"  class="nickname-form-size" required>
                    </div>
                    <div class="review-flex mb-4">
                        <label for="reviewComment" class="label-width">レビューコメント：</label>
                        <textarea type="text" id="reviewComment" name="reviewComment" class="reviewComment-form-size"></textarea>
                    </div>
                    <div class="review-flex mb-3">
                        <label for="review" class="label-width" style="padding-top: 10px;">満足度</label>
                        <div id="reviewStars" class="star-rating">
                            <select name="levelOfSatisfaction" class="nickname-form-size">
                                <option value="1">⭐️</option>
                                <option value="2">⭐️⭐️</option>
                                <option value="3">⭐️⭐️⭐️</option>
                                <option value="4">⭐️⭐️⭐️⭐️</option>
                                <option value="5">⭐️⭐️⭐️⭐️⭐️</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">送信</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
