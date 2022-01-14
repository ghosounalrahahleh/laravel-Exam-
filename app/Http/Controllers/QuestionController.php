<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Exam;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Answer;
use Faker\Core\Number;

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
        $total_q   = count($questions);
        session()->put('exam_id', $id);
        return view('public-site.questions', compact('questions', 'total_q'));
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
        $questions = Question::paginate(10);
        $update     = false;
        return view('admin_dashboard.manage_questions', compact('exams', 'questions', 'update'));
    }

    public function backendstore(StoreQuestionRequest $request)
    {
        Question::create([
            "text"    => $request->text,
            'points'  => $request->points,
            'exam_id' => $request->exam_title,
        ]);
        $question = Question::latest()->first();
        $q_id = $question->id;
        //dd($question );
        $answers        = $request->answer;
        $correct_status = $request->correct;
        foreach ($answers as $key => $value) {
            Answer::create([
                'answer'      => $value,
                'correct'     => $correct_status[$key],
                'question_id' => $q_id,
            ]);
        };

        return redirect()->back();
    }

    public function backendedit($id)
    {
        $question  = Question::find($id);
        $answers   = $question->answers->toArray();
        //dd($answers);
        $update    = true;
        $exams     = Exam::all();
        $questions = Question::paginate(10);
        return view('admin_dashboard.manage_questions', compact('exams', 'questions', 'question', 'update', 'answers'));
    }

    public function backendupdate(UpdateQuestionRequest $request,  $id)
    {
        // $this->validate($request, [
        //     '*' => 'required',
        // ]);
        $question = Question::find($id);
        $answers   = $question->answers;

        //question update
        $question->text    = $request->text;
        $question->points  = $request->points;
        $question->exam_id = $request->exam_title;
        $question->update();
        //answers update
        $input_answers   = $request->answer;
        $correct_status = $request->correct;
       //dd ($answers);
        foreach ($answers as $key => $answer) {
            $answer['answer']      = $input_answers[$key];
            $answer['correct']     = $correct_status[$key];
            $answer['question_id'] = $id;
            $answers[$key]->update();
        };

        return redirect()->route('question.index');
    }
    public function backenddestroy($request)
    {
        $question = Question::find($request);
        $question->delete();
        return redirect()->route('question.index');
    }
}
