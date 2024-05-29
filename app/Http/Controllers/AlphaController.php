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
        $episodes = Episode::where('series_id', $s_id)->get();
        $episode = Episode::where('series_id', $s_id)->first();
        return view('Alpha.readSeries', compact('episodes','episode'));
    }

    public function readEpisodes($id, $e_id)
    {
        //dd($e_id);
        $episodes = Episode::find($e_id);
        return view('Alpha.readEpisodes', compact('episodes'));
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
