<div class="card mx-20 mt-5">
    <div class="card-header">現在表示しているお客さんへのお知らせ内容</div>
    <div class="card-body">
        <table class="table table-striped p-4" id="estimate" style="white-space: normal;">
            <thead>
                <tr>
                    <th class="text-center">表示内容</th>
                    <th class="text-center" style="width: 250px">投稿者</th>
                    <th class="text-center" style="width: 250px">更新者</th>
                    <th class="text-center" style="width: 100px">画像有無</th>
                    <th class="text-center" style="width: 200px">投稿日時</th>
                    <th class="text-center" style="width: 120px">編集</th>
                    <th class="text-center" style="width: 120px">削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notices as $notice)
                    @php
                        $dataToSearch = $userData . '_' . $notice->id;
                    @endphp

                    <tr style="height: 60px; background-color: #FFF; border-bottom:1px #eee solid;">
                        <td class="text-center pb-0 font-size-12">
                            <span>{{ $notice->info['noticeContent'] }}</span>
                        </td>
                        <td class="text-center pb-0 font-size-12">
                            <span>{{ $notice->info['author'] }}</span>
                        </td>
                        <td class="text-center pb-0 font-size-12">
                            @if (empty($notice->info['changer'] ?? ''))
                                <span>-</span>
                            @else
                                <span>{{ $notice->info['changer'] }}</span>
                            @endif
                        </td>
                        <td class="text-center pb-0 font-size-12">
                            @if(empty($notice->info['image']))
                                <span>無</span>
                            @else
                                <span>有</span>
                            @endif
                        </td>
                        <td class="text-center pb-0 font-size-12" style="width: 200px">
                            {{ $notice->updated_at }}
                        </td>
                        <td class="text-center pb-0" style="width: 120px">
                            <form class="mb-0" method="post" action="/cafe_administrator/edit_notice">
                                @csrf
                                <button type="submit" class="btn btn-primary" name="userAndNoticeId" value="{{ $dataToSearch }}">編集</button>
                            </form>
                        </td>
                        <td class="text-center pb-0" style="width: 120px">
                            <form class="mb-0" method="post" action="/cafe_administrator/delete_notice">
                                @csrf
                                <button type="submit" class="btn btn-danger" name="userIdAndDisplayId" value="{{ $dataToSearch }}">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form method="post" action="/cafe_administrator/create_notice">
            @csrf
            <div class="text-right">
                <button type="submit" class="btn btn-primary" name="userId" value="{{ $userData }}">投稿追加</button>
            </div>
        </form>
    </div>
</div>