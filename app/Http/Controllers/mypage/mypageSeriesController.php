<?php

namespace App\Http\Controllers\mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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

                $new_genres->save();
            }

            /* 完了画面を表示する */
            $url = '/mypage/'. $request->member_id. '/'. $now_series->id. '/createEpisode';
            return redirect($url);
        }

    }

    public function showSeriesEditingPage($member_id, $series_id){
        $current_id = Auth::id();

        //member本人のシリーズか否か
        $frag = false;
        $member = Member::find($member_id);
        foreach ($member->series as $novel ){
            if($novel->id == $series_id){
                $frag = true;
                break;
            }
        }

        if($current_id == $member_id){
            if($frag == true){
                $series=Series::find($series_id);
                $genres=Genre::all();
                return view('Alpha.Mypage.series_edit', compact('member_id','genres','series'));
            }else{
                return view('Alpha.Mypage.validateUser');
            }
        }else{
            return view('Alpha.Mypage.validateUser');
        }
    }

    public function editSeries(Request $request){
        if($request->has('edit')){
            //dd($request);

            $validate = $request -> validate( [
                /* name 欄を 必須項目、2文字以上、100文字以内で形式判定する */
                'title' => ['required', 'min:2', 'max:100'],
                'abst' => ['required', 'max:2000'],
                'genres' => ['required']
            ]);

            if ($request->has('back')){
                /* withInput() で、現在の入力内容をリダイレクトのリクエストに付加する */
                $url = '/mypage/'. $request->member_id. '/editSeries/'. $request->series_id;
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

            return view('Alpha.Mypage.confirmEditSeries', compact('request', 'creGenres', 'file_path'));
        }

        if ($request->has('backCreate')){
            /* withInput() で、現在の入力内容をリダイレクトのリクエストに付加する */
            $url = '/mypage/'. $request->member_id. '/editSeries/'. $request->series_id;
            return redirect($url)->withInput();
        }

        if ($request->has('confirm')) {
            //dd($request);
            $series = Series::find($request->series_id);

            //dd($new_series);

            /* リクエストで渡された値を設定する */
            $series->member_id = $request->member_id;
            $series->title = $request->title;
            $series->abstract = $request->abst;
            if($request->cover_image_path != null){
                $series->cover_image_path = $request->cover_image_path;
            }

            /* データベースに保存 */
            $series->save();

            $now_series=Series::select('id')->where('member_id',$request->member_id)->latest()->first();

            //一旦ジャンルシリーズ中間テーブル削除してもっかい入れる
            $db_data = new Genre_Series;
            $db_data->where('series_id', $request->series_id)->delete();

            foreach($request->genres as $genre){
                $new_genres = new Genre_Series();
                $new_genres->genre_id = $genre;
                $new_genres->series_id = $now_series->id;

                $new_genres->save();
            }

            /* 完了画面を表示する */
            $url = '/mypage/'. $request->member_id. '/'. $request->series_id;
            return redirect($url);
        }
    }

    public function showEditMember(){
        $member_id=Auth::id();
        $memberInfo = Member::find($member_id);
        return view('Alpha.Mypage.editMember',compact('memberInfo'));
    }

    public function editMember(Request $request){
        $member_id=Auth::id();
        $memberInfo = Member::find($member_id);

        //dd($memberInfo->toArray(),$request->toArray());
        $memberInfoArray = $memberInfo->toArray();
        $requestArray = $request->toArray();
        if($memberInfoArray['email'] == $requestArray['email']){
            //dd($request);
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required'],
            ]);

            // if ($request->has('back')){
            //     return redirect('/mypage/editMember');
            // }

            $memberInfo->name = $request->name;
            //$memberInfo->email = $request->email;
        }else{
            //dd($request);
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Member::class],
            ]);

            if ($request->has('back')){
                return redirect('/mypage/editMember');
            }

            $memberInfo->name = $request->name;
            $memberInfo->email = $request->email;
        }

        $memberInfo->save();

        return redirect('/mypage');
    }

        // $user = Member::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        //event(new Registered($user));

        //Auth::login($user);
        public function showChangePass(){
            return view('Alpha.Mypage.changePass');
        }

        public function changePass(Request $request){
            $member_id=Auth::id();
            $memberInfo = Member::find($member_id);

            $memberInfoArray = $memberInfo->toArray();
            $requestArray = $request->toArray();

            if($requestArray['pass'] == $requestArray['pass_conf']){
                //dd($requestArray['pass'],$requestArray['pass_conf']);
                $request->validate([
                    'pass' => ['required', 'string', 'min:8'],
                ]);

                if ($request->has('back')){
                    return redirect('/mypage/editMember');
                }

                $memberInfo->password = Hash::make($request->pass);

                $memberInfo->save();

                return redirect('/mypage');
            }else{
                //dd($requestArray['pass_conf'],$requestArray['pass']);
                return redirect('/mypage/editMember/changePass')->with('message', '※パスワードが一致しません');
            }
        }

}
