<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Exam;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Answer;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions = Question::where('exam_id', $id)->get();
        $question  = Question::where('exam_id', $id)->first();
        $answers   = Answer::all();
        $total_q   = count($questions);
        session()->put('exam_id',$id);
        //dd($total_q);
        return view('public-site.questions', compact('questions', 'total_q', 'question', 'answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionRequest  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }

    //Dashboard
    public function backendindex()
    {
        $exams      = Exam::all();
        $questions = Question::all();
        $update     = false;
        return view('admin_dashboard.manage_questions', compact('exams', 'questions', 'update'));
    }
    public function backendstore(StoreQuestionRequest $request)
    {
        $this->validate($request, [
            'text'       => 'required|max:250',
            'points'     => 'required',
            'exam_title' => 'required',
        ]);

        Question::create([
            "text"    => $request->text,
            'points'  => $request->points,
            'exam_id' => $request->exam_title,
        ]);
        return redirect()->back();
    }

    public function backendedit($id)
    {
        $update    = true;
        $exams     = Exam::all();
        $questions = Question::all();
        $question  = Question::find($id);

        return view('admin_dashboard.manage_questions', compact('exams', 'questions', 'question', 'update'));
    }
    public function backendupdate(UpdateQuestionRequest $request,  $id)
    {
        $question          = Question::find($id);
        $question->text    = $request->text;
        $question->points  = $request->points;
        $question->exam_id = $request->exam_title;

        $question->update();
        return redirect()->route('questions.index');
    }
    public function backenddestroy($request)
    {
        $question = Question::find($request);
        $question->delete();
        return redirect()->route('questions.index');
    }
}
