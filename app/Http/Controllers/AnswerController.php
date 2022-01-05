<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Models\Question;

class AnswerController extends Controller
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
     * @param  \App\Http\Requests\StoreAnswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnswerRequest  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }


    //Dashboard
    public function backendindex()
    {
        $questions = Question::all();
        $answers   = Answer::all();
        $update     = false;
        return view('admin_dashboard.manage_answers', compact('answers', 'questions', 'update'));
    }
    public function backendstore(StoreAnswerRequest $request)
    {
        $this->validate($request, [
            'answer'  => 'required|max:250',
            'correct' => 'required',
            'q_title' => 'required',
        ]);

        Answer::create([
            'answer'      => $request->answer,
            'correct'     => $request->correct,
            'question_id' => $request->q_title,
        ]);
        
        return redirect()->back();
    }

    public function backendedit($id)
    {
        $update    = true;
        $questions = Question::all();
        $answers   = Answer::all();
        $answer    = Answer::find($id);

        return view('admin_dashboard.manage_answers', compact('answers', 'questions', 'answer', 'update'));
    }

    public function backendupdate(UpdateAnswerRequest $request,  $id)
    {
        $answer              = Answer::find($id);
        $answer->answer      = $request->answer;
        $answer->correct     = $request->correct;
        $answer->question_id = $request->q_title;
        $answer->update();
        return redirect()->route('answers.index');
    }

    public function backenddestroy($request)
    {
        $answer = Answer::find($request);
        $answer->delete();
        return redirect()->route('answers.index');
    }
}
