<table class="table table-striped p-4" id="estimate" style="white-space: normal;">
    <thead>
        <tr>
            <th class="text-center">連絡内容</th>
            <th class="text-center" style="width: 256px">投稿者</th>
            <th class="text-center" style="width: 256px">更新者</th>
            <th class="text-center" style="width: 256px">投稿日時</th>
            <th class="text-center" style="width: 120px">編集</th>
            <th class="text-center" style="width: 120px">削除</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($displayDatas as $displayData)
            @php
                $dataToSearch = $userData . '/' . $displayData->id;
            @endphp

            <tr style="height: 60px; background-color: #FFF; border-bottom:1px #eee solid;">
                <td class="text-center pb-0">
                    <span>{{ $displayData->info['businessContact'] }}</span>
                </td>
                <td class="text-center pb-0">
                    <span>{{ $displayData->info['author'] }}</span>
                </td>
                <td class="text-center pb-0">
                    @if (empty($displayData->info['changer'] ?? ''))
                        <span>-</span>
                    @else
                        <span>{{ $displayData->info['changer'] }}</span>
                    @endif
                </td>
                <td class="text-center pb-0" style="width: 256px">
                    {{ $displayData->updated_at }}
                </td>
                <td class="text-center pb-0" style="width: 120px">
                    @php
                        $dataToSearch = $userData . '/' . $displayData->id;
                    @endphp
                    <form class="mb-0" method="post" action="/cafe_administrator/contact_edit">
                        @csrf
                        <button type="submit" class="btn btn-primary" name="id" value="{{ $dataToSearch }}">編集</button>
                    </form>
                </td>
                <td class="text-center pb-0" style="width: 120px">
                    @php
                        $dataToSearch = $userData . '/' . $displayData->id;
                    @endphp
                    <form class="mb-0" method="post" action="/cafe_administrator/contact_delete">
                        @csrf
                        <button type="submit" class="btn btn-danger" name="userIdAndDisplayId" value="{{ $dataToSearch }}">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
