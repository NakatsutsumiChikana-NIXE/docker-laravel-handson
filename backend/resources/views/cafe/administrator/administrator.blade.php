<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>カフェ_管理者画面</title>
        <link rel="stylesheet" href="{{ asset('/css/cafe/administrator.css') }}">
        <link rel="stylesheet" href="/css/bootstrap.css">
    </head>
    <body>
        <header class="mt-3">
            <h1>管理者画面</h1>
        </header>

        <div class="card mx-20">
            <div class="card-header">業務連絡</div>
            <div class="card-body">
                <div>
                    @include('layout.contact', ['userId' => $userData, 'displayDatas' => $businessContacts])
                </div>
                <form method="post" action="/cafe_administrator/contact_create">
                    @csrf
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" name="userData" value="{{ $userData }}">内容追加</button>
                    </div>
                </form>
            </div>
        </div>
        <div>
            @include('layout.notice', ['userId' => $userData, 'notices' => $notices])
        </div>
    </body>
</html>
