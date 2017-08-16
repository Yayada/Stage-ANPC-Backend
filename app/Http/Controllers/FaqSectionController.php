<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use App\FaqSection;

class FaqSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqSections = FaqSection::with('FaqQuestions')->get();

        return view('faq_sections/all',['faqSections' => $faqSections]);
    }

    public function byFaq($id)
    {
        $faqSections = FaqSection::where('faq_id','=',$id)->get();

        return view('faq_sections/all',['faqSections' => $faqSections]);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faqs = Faq::all();

        return view('faq_sections/add',['faqs' => $faqs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faq = Faq::find($request->input('faq'));

        $faqSection = new FaqSection;
        $faqSection->faq_id = $request->input('rubrique');
        $faqSection->title = $request->input('title');
        
        $faq->faqSections()->save($faqSection);

        return redirect()->route('sections.index'); 
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
        $faqSection = FaqSection::with('faq')->find($id);

        $faqs = Faq::all()->where('title', '<>', $faqSection->faq->title);

        return view('faq_sections/edit',['faqSection' => $faqSection, 'faqs' => $faqs]);
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
        $faqSection = FaqSection::find($id);

        $faqSection->faq_id = $request->input('faq');
        $faqSection->title = $request->input('title');

        $faqSection->save();

        return redirect()->route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqSection = FaqSection::find($id);

        $faqSection->delete();

        return redirect()->route('sections.index');
    }
}
