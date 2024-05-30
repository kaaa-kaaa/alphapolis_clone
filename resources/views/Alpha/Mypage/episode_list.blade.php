<h3>{{$member->name}}のページ</h3>


<h1>作成済エピソード一覧</h1>

@if ($series->episodes->count() > 0)

<h3>{{$series->title}}のエピソード</h3>
<a href="/mypage/{{$member->id}}/{{$series->id}}/createEpisode">新しいエピソードを作成する</a>
<table border="1">
    <tr>
        <th>サブタイトル</th>
        <th>本文</th>
        <th>作成日時</th>
        <th>更新日時</th>
        <th>編集</th>
    </tr>
    {{-- @foreach ディレクティブで、1件ずつ処理 --}}
    @foreach ($series->episodes as $episode)
        <tr>
            <td>{{ $episode->subtitle }}</td>
            <td><a href="#">会員じゃなくても誰でも見れるエピソード本文ページへのリンク</a></td>
            <td>{{ $episode->created_at }}</td>
            <td>{{ $episode->updated_at }}</td>
            <td><a href="/mypage/{{$member->id}}/editEpisode/{{ $episode->id }}">編集</a></td>
        </tr>
    @endforeach
</table>

@else
    <p>無</p>
@endif
