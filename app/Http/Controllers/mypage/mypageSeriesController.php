<?php

namespace App\Http\Controllers\mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Member;
use App\Models\Series;
use App\Models\Genre;
use Illuminate\Support\Facades\Session;
use App\Models\Genre_Series;

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

        return view('Alpha.Mypage.mypage', compact('member','series'));
    }

    public function showCreatingSeriesPage($member_id){
        $current_id = Auth::id();

        $genres=Genre::all();

        if($current_id == $member_id){
            return view('Alpha.Mypage.createSeries', compact('member_id', 'genres'));
        }else{
            return view('Alpha.Mypage.validateUser');
        }
    }

    public function createSeries(Request $request){
        /* バリデーションを実施する */
        if($request->has('create')){
            //dd($request);

            $validate = $request -> validate( [
                /* name 欄を 必須項目、2文字以上、100文字以内で形式判定する */
                'title' => ['required', 'min:2', 'max:100'],
                'abst' => ['required', 'max:2000'],
                'genres' => ['required']
            ]);

            if ($request->has('back')){
                /* withInput() で、現在の入力内容をリダイレクトのリクエストに付加する */
                $url = '/mypage/'. $request->member_id. '/createSeries';
                return redirect($url)->withInput();
            }

            $creGenres = [];
            foreach($request->genres as $genre){
                $genre_name=Genre::find($genre);
                array_push($creGenres,$genre_name->name);
            }

            $file = $request->file('cover_image_path');
            if($file == null){
                $file_path=null;
            }else{
                $file_path = $file->store('public/images/series_cover_image');
                Session::put('img_path', str_replace('public', 'storage', $file_path));
            }

            return view('Alpha.Mypage.confirmSeries', compact('request', 'creGenres', 'file_path'));
        }

        if ($request->has('backCreate')){
            /* withInput() で、現在の入力内容をリダイレクトのリクエストに付加する */
            $url = '/mypage/'. $request->member_id. '/createSeries';
            return redirect($url)->withInput();
        }

        if ($request->has('confirm')) {
            //dd($request);
            $new_series = new Series();

            //dd($new_series);

            /* リクエストで渡された値を設定する */
            $new_series->member_id = $request->member_id;
            $new_series->title = $request->title;
            $new_series->abstract = $request->abst;
            $new_series->cover_image_path = $request->cover_image_path;

            /* データベースに保存 */
            $new_series->save();

            $now_series=Series::select('id')->where('member_id',$request->member_id)->latest()->first();

            foreach($request->genres as $genre){

                $new_genres = new Genre_Series();
                $new_genres->genre_id = $genre;
                $new_genres->series_id = $now_series->id;
            }

            /* 完了画面を表示する */
            $url = '/mypage/'. $request->member_id. '/'. $now_series->id. '/createEpisode';
            return redirect($url);
        }

    }

    public function showSeriesEditingPage($member_id, $series_id){
        return view('Alpha.Mypage.createSeries', compact('member_id'));
    }

    public function editSeries(Request $request){

    }
}
