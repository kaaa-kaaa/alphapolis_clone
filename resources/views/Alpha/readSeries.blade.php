<h2>エピソード一覧</h2>
<a href="/index">トップページへ</a>

<h3>{{ $episode->series->title }}</h3>
<h4>著：{{ $episode->series->member->name }}</h4>
<p>{{ $episode->series->abstract }}</p>

@if ($episodes->count() > 0)
    <table border="1">
        <tr>
            <th>エピソード名</th>
        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理 --}}
        @foreach ($episodes as $episode)
            <tr>
                <td><a href="/read/{{ $episode->series_id }}/{{ $episode->id }}">{{ $episode->subtitle }}</a></td>
            </tr>
        @endforeach
    </table>
@else
    <p>エピソードがありません</p>
@endif
