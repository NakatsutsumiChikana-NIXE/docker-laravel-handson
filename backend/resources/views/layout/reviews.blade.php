<table class="table table-striped p-4" id="reviews" style="white-space: normal;">
    <thead>
        <tr>
            <th class="text-center">ニックネーム</th>
            <th class="text-center">コメント</th>
            <th class="text-center">満足度</th>
            <th class="text-center">投稿日時</th>
        </tr>
    </thead>
    <tbody>
        @if(!is_null($reviews) && count($reviews) > 0)
            @foreach ($reviews as $review)
                <tr style="height: 60px; background-color: #FFF; border-bottom:1px #eee solid;">
                    <td class="text-center pb-0">
                        <span>{{ $review['nickname'] }}</span>
                    </td>
                    <td class="text-center pb-0">
                        <span>{!! $review['reviewComment'] !!}</span>
                    </td>
                    <td class="text-center pb-0">
                        {{ $review['numOfStars'] }}
                    </td>
                    <td class="text-center pb-0">
                        {{ $review['created_at'] }}
                    </td>
                </tr>
            @endforeach
        @else
            <tr style="height: 60px; background-color: #FFF; border-bottom:1px #eee solid;">
                <td colspan="6" class="text-center">現在、誰もレビューを記載しておりません</td>
            </tr>
        @endif
    </tbody>
</table>
