<h3>{{$member->name}}のページ</h3>
<a href="/mypage/{{$member->id}}/{{$series->id}}">作成済エピソード一覧に戻る</a>

<h1>エピソード作成画面</h1>


<form action="/mypage/{{$member->id}}/{{$series->id}}/createEpisode" method="POST">
    {{-- GET メソッド以外でリクエストする場合は、@csrfを含める --}}
    @csrf

    <div>
        <h2>{{$series->title}}の新しいエピソードを作成する</h2>
        <div>
            <label for="is_release">公開</label>
            <input type="radio" name="is_release" id="is_release" value=1 checked>
            <label for="is_release">非公開</label>
            <input type="radio" name="is_release" id="is_not_release" value=0>
        </div>

        <div>
            <label for="subtitle">
                <h3>エピソードタイトル</h3>
            </label>
            <input type="text" name="subtitle" id="subtitle" size="100">
            {{-- @if ($errors->has('項目名')) でエラーがあるかを判定 --}}
            @if ($errors->has('subtitle'))
                <p class="error">*{{ $errors->first('subtitle') }}</p>
            @endif
        </div>

        <div>
            <label for="episode_text">
                <h3>本文</h3>
            </label>
            <textarea name="episode_text" id="episode_text" cols="150" rows="30"></textarea>
            {{-- @if ($errors->has('項目名')) でエラーがあるかを判定 --}}
            @if ($errors->has('episode_text'))
                <p class="error">*{{ $errors->first('episode_text') }}</p>
            @endif
        </div>

        <input type="hidden" name="series_id" value="{{$series->id}}">
        <input type="hidden" name="member_id" value="{{$member->id}}">

    </div>

    <input type="submit" value="ここを押すと作成されます。">
</form>

