<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Rubrique;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::with('rubrique')->get();

        return view('videos/all',['videos' => $videos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rubriques = Rubrique::all();

        return view('videos/add',['rubriques' => $rubriques]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rubrique = Rubrique::find($request->input('rubrique'));

        $video = new Video;
        $video->rubrique_id = $request->input('rubrique');
        $video->url = $request->input('url');
        $video->description = $request->input('description');
        $video->title = $request->input('title');
        
        $rubrique->videos()->save($video);

        return redirect()->route('videos.index');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::with('rubrique')->find($id);

        $rubriques = Rubrique::all()->where('name', '<>', $video->rubrique->name);

        return view('videos/edit',['video' => $video, 'rubriques' => $rubriques]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Video::find($id);

        $video->rubrique_id = $request->input('rubrique');
        $video->description = $request->input('description');
        $video->url = $request->input('url');

        $video->save();

        return redirect()->route('videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);

        $video->delete();

        return redirect()->route('videos.index');
    }

    public function videosByRubrique($rubriqueId)
    {
        $videos = Video::with('rubrique')->where('rubrique_id','=',$rubriqueId)->get();

        return response()->json($videos);  
    }
}
