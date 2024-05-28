<h1>エピソード一覧</h1>

@if ($series->count() > 0)

<table border="1">
    <tr>
        <th>サブタイトル</th>
        <th>作成日時</th>
        <th>更新日時</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    {{-- @foreach ディレクティブで、1件ずつ処理 --}}
    @foreach ($seriess as $series)
        <tr>
            <td>{{ $series->subtittle }}</td>
            <td>{{ $series->created_at }}</td>
            <td>{{ $series->updated_at }}</td>
            <td><a href="//{{ $series->id }}/edit">編集〜〜</a></td>

            /mypage/{member_id}/{series_id}

            <td>{{ $series-> }}</td>
            <td>{{ $series->address }}</td>
            <td>{{ $series->review }}</td>
            <td>{{ $series->created_at }}</td>
            <td><a href="/cafes/{{ $series->id }}">本文</a></td>
            <td><a href="/cafes/{{ $series->id }}/edit">編集〜〜</a></td>
            <td>
                {{-- 各お問い合わせデータごとに、削除ボタンを追加 --}}
                {{-- 「削除」というデータの内容変更を伴う操作なので、form からPOST メソッドを使う --}}
                {{-- action先URLにIDを含めて、削除するデータを特定できるようにしておく --}}
                <form action="/cafes/{{ $series->id }}" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit"  name="delete" value="削除">
                </form>
            </td>
        </tr>
    @endforeach
</table>

@else
    <p>無</p>
@endif
