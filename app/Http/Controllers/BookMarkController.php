<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Member_Series;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class BookMarkController extends Controller
{

    public function bookMark(Request $request) {

        $login_member_id = Auth::id();

        $book_mark_series_id = $request->series_id;

        $bookMark = Member_Series::where([
            ['member_id', '=', $login_member_id],
            ['series_id', '=', $book_mark_series_id],
        ])->limit(1)->get();

        if($bookMark->isNotEmpty()){
            return redirect()->route('readSeries', ['series_id' => $book_mark_series_id]);
        }

        $member_series = new Member_Series();
        $member_series->member_id = $login_member_id;
        $member_series->series_id = $book_mark_series_id;

        /* データベースに保存 */
        $member_series->save();

        return redirect()->route('readSeries', ['series_id' => $book_mark_series_id]);
    }

    public function removeBookMark() {
        $member_id = Auth::id();

        $member = Member::find($member_id);

        return view('Alpha.Mypage.bookMarkList', compact('member'));
    }
}
