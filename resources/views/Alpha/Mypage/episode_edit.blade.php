<h3>{{$member->name}}のページ</h3>
<a href="/mypage/{{$member->id}}/{{$series->id}}">作成済エピソード一覧に戻る</a>

<h1>エピソード編集画面</h1>

<h2>小説タイトル：{{$series->title}}</h2>


<form action="/mypage/{{$member->id}}/editEpisode/{{$episode->id}}" method="post">
    @csrf

    <div>
        <h2>エピソード：{{$episode->subtitle}}</h2>
        <div>


            <label for="is_release">公開</label>
            <input type="radio" name="is_release" id="is_release" value=1 @if($episode->is_release == 1) checked @endif >
            <label for="is_release">非公開</label>
            <input type="radio" name="is_release" id="is_not_release" value=0 @if($episode->is_release == 0) checked @endif>

        </div>

        <div>
            <label for="subtitle">
                <h3>エピソードタイトル</h3>
            </label>
            <input type="text" name="subtitle" id="subtitle" size="100", value="{{old('subtitle', $episode->subtitle)}}">
            {{-- @if ($errors->has('項目名')) でエラーがあるかを判定 --}}
            @if ($errors->has('subtitle'))
                <p class="error">*{{ $errors->first('subtitle') }}</p>
            @endif
        </div>



        <div>
            <label for="episode_text">
                <h3>本文</h3>
            </label>
            <textarea name="episode_text" id="episode_text" cols="150" rows="30">{{$episode->episode_text}}</textarea>
            {{-- @if ($errors->has('項目名')) でエラーがあるかを判定 --}}
            @if ($errors->has('episode_text'))
                <p class="error">*{{ $errors->first('episode_text') }}</p>
            @endif
        </div>

        <input type="hidden" name="series_id" value="{{$series->id}}">
        <input type="hidden" name="member_id" value="{{$member->id}}">
        <input type="hidden" name="episode_id" value="{{$episode->id}}">

    </div>

    <input type="submit" value="ここを押すと適応されます。">
</form>

{{-- <form action="/mypage/{{$member->id}}/editEpisode/{{$episode->id}}" method="post"> --}}
<form action="/mypage/{{$member->id}}/editEpisode/{{$episode->id}}/confirm" method="post">
    @csrf
    <input type="hidden" name="series_id" value="{{$series->id}}">
    <input type="hidden" name="member_id" value="{{$member->id}}">
    <input type="hidden" name="episode_id" value="{{$episode->id}}">

    <input type="submit"  name="delete" value="削除">
</form>
