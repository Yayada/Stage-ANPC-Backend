<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rubrique;

class RubriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubriques = Rubrique::all();
        
        return view('rubriques/all',['rubriques'=>$rubriques]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rubriques/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rubrique = new Rubrique;
        $rubrique->name = $request->input('name');
        $rubrique->save();

        return redirect()->route('rubriques.index');
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
        $rubrique = Rubrique::find($id);

        return view('rubriques/edit',['rubrique'=>$rubrique]);
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
        $rubrique = Rubrique::find($id);

        $rubrique->name = $request->input('name');

        $rubrique->save();

        return redirect()->route('rubriques.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rubrique = Rubrique::find($id);

        $rubrique->delete();

        return redirect()->route('rubriques.index');
    }
}
