<h2>シリーズ一覧</h2>

<a href="/login">ログイン</a>
<a href="/register">会員登録</a>
<a href="/myspage">マイページ</a>
<a href="/search">検索</a>

@if ($series->count() > 0)
    <table border="1">
        <tr>
            <th>シリーズ名</th>
        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理 --}}
        @foreach ($series as $novel)
            <tr>
                <td><a href="/read/{{ $novel->id }}">{{ $novel->title }}</a></td>
            </tr>
        @endforeach
    </table>
@else
    <p>小説がありません</p>
@endif
