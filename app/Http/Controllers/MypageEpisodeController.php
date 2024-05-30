<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Series;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageEpisodeController extends Controller
{


    public function showCreatingEpisodePage($member_id, $series_id){

        $member = Member::find($member_id);
        $series = Series::find($series_id);

        if(is_null($series) or is_null($member)){
            return view('Alpha.Mypage.not_found');
        }

        $login_member_id = Auth::id();
        if($member_id == $login_member_id and $member_id == $series->member_id and $series->id){
            return view('Alpha.Mypage.createEpisode', compact('member', 'series'));
        }else{
            return view('Alpha.Mypage.validateUser');
        }
    }

    public function createEpisode(Request $request){
        $new_episode = new Episode();

        $new_episode->series_id = $request->series_id;
        $new_episode->subtitle = $request->subtitle;
        $new_episode->episode_text = $request->episode_text;
        $new_episode->is_release = $request->is_release;

        $validated = $request->validate([
            'subtitle' => 'required',
            'episode_text' => 'required'
        ]);

        /* データベースに保存 */
        $new_episode->save();

        $member=Member::find($request->member_id);
        $series = Series::find($request->series_id);

        $member_id = $request->member_id;
        $login_member_id = Auth::id();

        if($member_id == $login_member_id and $member_id == $series->member_id){
            return view('Alpha.Mypage.episode_list', compact('member', 'series'));
        }else{
            return view('Alpha.Mypage.validateUser');
        }

    }

    public function showEpisodeList($member_id, $series_id){

        //ルートパラメータを受け取れているのかチェック
        // dd($member_id, $series_id);

        $member = Member::find($member_id);
        $series = Series::find($series_id);

        if(is_null($series) or is_null($member)){
            return view('Alpha.Mypage.not_found');
        }

        $login_member_id = Auth::id();

        if($member_id == $login_member_id and $member_id == $series->member_id){
            /* episode_listに、データを表示する */
            return view('Alpha.Mypage.episode_list', compact('member', 'series'));
        }else{
            return view('Alpha.Mypage.validateUser');
        }
    }

    public function showEpisodeEditingPage($member_id, $episode_id){

        // dd($member_id, $episode_id);

        $member = Member::find($member_id);
        $episode = Episode::find($episode_id);

        if(is_null($member) or is_null($episode)){
            return view('Alpha.Mypage.not_found');
        }

        $series = Series::find($episode->series_id);

        $login_member_id = Auth::id();

        if($member_id == $login_member_id and $member_id == $series->member_id and $series->id == $episode->series_id){
            return view('Alpha.Mypage.episode_edit', compact('member', 'series', 'episode'));
        }else{
            return view('Alpha.Mypage.validateUser');
        }


    }

    public function editEpisode(Request $request){

        $update_episode = Episode::find($request->episode_id);

        $update_episode->is_release = $request->is_release;
        $update_episode->subtitle = $request->subtitle;
        $update_episode->episode_text = $request->episode_text;

        $validated = $request->validate([
            'subtitle' => 'required',
            'episode_text' => 'required'
        ]);

        $update_episode->save();

        $member=Member::find($request->member_id);
        $series = Series::find($request->series_id);

        $member_id = $request->member_id;
        $login_member_id = Auth::id();

        if($member_id == $login_member_id and $member_id == $series->member_id and $series->id == $update_episode->series_id){
            return view('Alpha.Mypage.episode_list', compact('member', 'series'));
        }else{
            return view('Alpha.Mypage.validateUser');
        }
    }

    public function deleteConfirm(Request $request){
        $delete_episode_name = Episode::find($request->episode_id)->subtitle;
        return view('Alpha.Mypage.deleteEpisodeConfirm', compact('request', 'delete_episode_name'));
    }

    public function deleteEpisode(Request $request){

        $delete_episode = Episode::find($request->episode_id);

        /* 取得したデータの削除を実行する */
        $delete_episode->delete();

        $member=Member::find($request->member_id);
        $series = Series::find($request->series_id);

        return view('Alpha.Mypage.episode_list', compact('member', 'series'));
    }
}
