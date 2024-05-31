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

<h2>{{ $series->title }}のエピソード一覧</h2>
@if($cover_path != null)
<img src="{{ asset(session('img_path')) }}" width="200px" height="auto" alt="{{ $series->title }}の表紙画像">
@endif

@if ($episodes->count() > 0)

    <form action="{{route('bookMark')}}" method="post">
        @csrf
        <input type="hidden" name="series_id" value="{{$series->id}}">
        <input type="submit" value="ブックマークする">
    </form>
    <form action="{{route('removeBookMark')}}" method="post">
        @csrf
        <input type="hidden" name="series_id" value="{{$series->id}}">
        <input type="submit" value="ブックマークを外す">
    </form>

    <h4>著：{{ $episode->series->member->name }}</h4>

    <h4>紹介</h4>
    <p>{{ $episode->series->abstract }}</p>
    <h4>ジャンル</h4>
    @foreach ($episode->series->genres as $genre)
        {{ $genre->name }}　
    @endforeach

    <table border="1">
        <tr>
            <th>エピソード名</th>
            <th>文字数</th>
        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理 --}}
        @foreach ($episodes as $episode)
            <tr>
                <td><a href="/read/{{ $episode->series_id }}/{{ $episode->id }}">{{ $episode->subtitle }}</a></td>
                <td>{{ Str::length($episode->episode_text) }}</td>
            </tr>
        @endforeach
    </table>
@else
    <p>エピソードがありません</p>
@endif
