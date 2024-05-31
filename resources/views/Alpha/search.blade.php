<h2>検索</h2>
<a href="/index">トップページ</a>

@guest
    <a href="/login">ログイン</a>
    <a href="/register">会員登録</a>
@endguest
@auth
    <a href="/mypage">マイページ</a>
    <a href="/logout">ログアウト</a>
@endauth
<a href="/search">検索ページ</a>

<div>
    <form action="/search" method="post">
    @csrf
        <input type="text" name="keyword">
        <input type="submit" value="検索">
    </form>
</div>

<a href="/search">検索をリセット</a>

@if ($series->count() > 0)
{{-- <p>{{$series}}</p> --}}
    <table border="1">
        <tr>
            <th>シリーズ名</th>
            <th>著者</th>
            <th>ジャンル</th>
        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理 --}}
        @foreach ($series as $novel)
        @if ($novel->episodes->count() > 0)
            <tr>
                <td><a href="/read/{{ $novel->id }}">{{ $novel->title }}</a></td>
                <td><a href="/index/{{ $novel->member_id }}">{{ $novel->member->name }}</a></td>
                <td>
                    @foreach ($novel->genres as $genre)
                        {{ $genre->name }}<br>
                    @endforeach
                </td>
            </tr>
        @endif
        @endforeach

    </table>
@else
    <p>小説がありません</p>
@endif
