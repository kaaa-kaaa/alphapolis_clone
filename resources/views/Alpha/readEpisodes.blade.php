<h2>エピソード閲覧</h2>
<a href="/index">トップページへ</a>

<h3>{{ $episodes->series->title}}</h3>
<p>著者：{{ $episodes->series->member->name}}</p>
<h4>{{ $episodes->subtitle }}</h4>
<p>{{ $episodes->cover_image_path }}</p>


<p>{{ $episodes->episode_text }}</p>
