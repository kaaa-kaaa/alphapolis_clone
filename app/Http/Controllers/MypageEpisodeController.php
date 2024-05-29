<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Series;
use App\Models\Episode;
use Illuminate\Http\Request;

class MypageEpisodeController extends Controller
{


    public function showCreatingEpisodePage($member_id, $series_id){

        $member = Member::find($member_id);
        $series = Series::find($series_id);

        return view('Alpha.Mypage.createEpisode', compact('member', 'series'));

    }

    public function createEpisode(Request $request){
        $new_episode = new Episode();

        $new_episode->series_id = $request->series_id;
        $new_episode->subtitle = $request->subtitle;
        $new_episode->episode_text = $request->episode_text;
        $new_episode->is_release = $request->is_release;

        /* データベースに保存 */
        $new_episode->save();

        $member=Member::find($request->member_id);
        $series = Series::find($request->series_id);

        return view('Alpha.Mypage.episode_list', compact('member', 'series'));
    }

    public function showEpisodeList($member_id, $series_id){

        //ルートパラメータを受け取れているのかチェック
        // dd($member_id, $series_id);

        $member = Member::find($member_id);
        $series = Series::find($series_id);

        /* episode_listに、データを表示する */
        return view('Alpha.Mypage.episode_list', compact('member', 'series'));
    }

    public function showEpisodeEditingPage($member_id, $episode_id){

        // dd($member_id, $episode_id);

        $member = Member::find($member_id);
        $episode = Episode::find($episode_id);
        $series = Series::find($episode->series_id);

        return view('Alpha.Mypage.episode_edit', compact('member', 'series', 'episode'));
    }

    public function editEpisode(Request $request){

        $update_episode = Episode::find($request->episode_id);

        $update_episode->is_release = $request->is_release;
        $update_episode->subtitle = $request->subtitle;
        $update_episode->episode_text = $request->episode_text;

        $update_episode->save();

        $member=Member::find($request->member_id);
        $series = Series::find($request->series_id);

        return view('Alpha.Mypage.episode_list', compact('member', 'series'));
    }
}
