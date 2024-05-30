<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Episode;
use Illuminate\Http\Request;

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
        $episodes = Episode::where('series_id', $s_id)->where('is_release', TRUE)->get();
        $episode = Episode::where('series_id', $s_id)->first();
        $series = Series::find($s_id);
        if(is_null($series)){
            return view('Alpha.notFound');
        }
        else{
            return view('Alpha.readSeries', compact('episodes','episode'));
            }
    }

    public function readEpisodes($s_id, $e_id)
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
            $series = Series::where('title', 'LIKE', "%{$keyword}%")->select('id','title')->get();

        }
        return view('Alpha.search', compact('series'));
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
