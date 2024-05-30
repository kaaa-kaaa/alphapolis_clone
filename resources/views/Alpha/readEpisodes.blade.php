<h2>エピソード閲覧</h2>
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

<h3>{{ $episodes->series->title}}</h3>
<p>著者：{{ $episodes->series->member->name}}</p>
<h4>{{ $episodes->subtitle }}</h4>


<p>{{ $episodes->episode_text }}</p>
