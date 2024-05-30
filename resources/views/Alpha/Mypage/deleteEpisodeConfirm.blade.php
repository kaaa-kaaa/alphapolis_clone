<h1>確認</h1>

<p>{{$delete_episode_name}}を本当に削除しますか？</p>
<p>一度削除すると、復元できません。</p>

<form action="/mypage/{{$request->member_id}}/editEpisode/{{$request->episode_id}}/delete" method="post">
    @csrf
    <input type="hidden" name="series_id" value="{{$request->series_id}}">
    <input type="hidden" name="member_id" value="{{$request->member_id}}">
    <input type="hidden" name="episode_id" value="{{$request->episode_id}}">

    <input type="submit"  name="delete" value="※削除する※">
</form>
