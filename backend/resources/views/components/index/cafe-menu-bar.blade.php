<div class="row" style="">
    <div class="col-sm-8"></div>
    <div class="col-sm-4">
        <nav class="text-right">
            <ul>
                <li><a style="text-decoration:none;" href="cafe_top">HOME</a></li>
                <li><a style="text-decoration:none;" href="cafe_menu">メニュー</a></li>
                <li><a style="text-decoration:none;" href="/cafe_news">News</a></li>
                <li><a style="text-decoration:none; cursor: pointer;" onclick="document.getElementById('reviewsForm').submit();">お客さんの口コミ</a></li>
                <li><a style="text-decoration:none;" href="/cafe_access">アクセス</a></li>
            </ul>
        </nav>
    </div>
</div>

<form id="reviewsForm" method="post" action="/cafe_reviews" style="display: none;">
    @csrf
</form>
