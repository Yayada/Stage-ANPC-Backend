<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FaqSection;
use App\FaqQuestion;
use App\Faq;

class FaqQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqQuestions = FaqQuestion::with('FaqSection')->get();

        return view('faq_questions/all',['faqQuestions' => $faqQuestions]);
    }

    public function byFaqSection($id)
    {
        $faqQuestions = FaqQuestion::where('faq_section_id','=',$id)->get();

        return view('faq_questions/all',['faqQuestions' => $faqQuestions]);
    }

    public function byFaq($id)
    {
        $faq = Faq::with('questions','faqSections')
                    ->where('id','=',$id)
                    ->first();
        $questions = FaqSection::with('faqQuestions')->where('faq_id','=',$id)->get();


        return response()->json($questions);
    }         

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $section = FaqSection::find($id);

        return view('faq_questions/add',['section' => $section]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = FaqSection::where('title','=',$request->input('section'))->first();

        $faqQuestion = new FaqQuestion;
        $faqQuestion->faq_section_id = $section->id;
        $faqQuestion->content = $request->input('question'); 
        $faqQuestion->response = $request->input('response'); 
        
        $section->faqQuestions()->save($faqQuestion);

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
        $faqQuestion = FaqQuestion::with('faqSection')->find($id);

        $faqSections = FaqSection::all()
                ->where('title', '<>', $faqQuestion->faqSection->title)
                ->where('faq_id','=',$faqQuestion->faqSection->id);

        return view('faq_questions/edit',['faqQuestion' => $faqQuestion, 'faqSections' => $faqSections]);
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
        $faqQuestion = FaqQuestion::find($id);

        $faqQuestion->faq_section_id = $request->input('section');
        $faqQuestion->content = $request->input('question');
        $faqQuestion->response = $request->input('response');

        $faqQuestion->save();

        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqQuestion = FaqQuestion::find($id);

        $faqQuestion->delete();

        return redirect()->route('questions.index');
    }
}
