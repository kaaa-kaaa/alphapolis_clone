<h2>検索</h2>
<a href="/index">トップページへ</a>

<div>
    <form action="/search" method="post">
    @csrf
        <input type="text" name="keyword">
        <input type="submit" value="検索">
    </form>
</div>

@if ($series->count() > 0)
{{-- <p>{{$series}}</p> --}}
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
