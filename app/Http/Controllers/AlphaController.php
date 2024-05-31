<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Series;
use App\Models\Episode;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlphaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Series::all();
        return view('Alpha.index', compact('series'));
    }

    public function readSeries($s_id)
    {

        $file_path = Series::where('id',$s_id)->select('cover_image_path')->get();
        $path = $file_path->toArray();
        $cover_path = $path[0]['cover_image_path'];
        Session::put('img_path', str_replace('public', 'storage', $cover_path));

        $episodes = Episode::where('series_id', $s_id)->where('is_release', TRUE)->get();
        $episode = Episode::where('series_id', $s_id)->first();
        $series = Series::find($s_id);
        if(is_null($series)){
            return view('Alpha.notFound');
        }
        else{
            return view('Alpha.readSeries', compact('episodes','episode', 'series', 'cover_path', ));
            }
    }

    public function readEpisode($s_id, $e_id)
    {
        $episodes = Episode::find($e_id);
        if(is_null($episodes)){
            return view('Alpha.notFound');
        }
        else{
            if($episodes->series->id != $s_id){
                return view('Alpha.notFound');
            }
            else{
                if($episodes->is_release== TRUE){
                    return view('Alpha.readEpisodes', compact('episodes'));
                }
                else{
                    return view('Alpha.notFound');
                }
            }
        }
    }

    public function showSearchingPage()
    {
        $series = Series::all();
        return view('Alpha.search', compact('series'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
            $members = Member::where('name', 'LIKE', "%{$keyword}%")->select('id')->get();
            $members_s = $members->toArray();
            // dd($members_s);
            $series = Series::where('title', 'LIKE', "%{$keyword}%")->select('id','member_id','title')
                ->orWhereIn('member_id', $members_s)->get();
            }
        return view('Alpha.search', compact('series'));
    }

    public function memberSeries($m_id)
    {
        $series = Series::where('member_id', $m_id)->get();
        $series_s = Series::where('member_id', $m_id)->first();
        $member = Member::find($m_id);
        if(is_null($member)){
            return view('Alpha.notFound');
        }
        else{
            return view('Alpha.memberSeries', compact('series', 'series_s', 'member'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
