<?php

namespace App\Http\Controllers\mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Member;
use App\Models\Series;

class mypageSeriesController extends Controller
{
    public function mypage(){
        // 現在認証しているユーザーのIDを取得
        $member_id = Auth::id();
        $member = Member::find($member_id);
        $memberSeries = $member->series->toArray();
        $series = Series::where('member_id',2)->get();
        //dd($memberSeries);
        //dd($series);

        return view('Alpha.mypage.mypage', compact('member','series'));
    }
}
