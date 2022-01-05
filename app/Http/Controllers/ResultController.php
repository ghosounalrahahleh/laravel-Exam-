<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Uanswer;
use App\Models\User;
use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public-site.result');
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
     * @param  \App\Http\Requests\StoreResultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResultRequest $request)
    {
        $mark       = 0;
        $exam_score = 0;

        foreach ($request->except('_token') as $key => $part) {
            $correct = Answer::where('correct', 1)
                ->where('question_id', $key)
                ->get()->first();

            $exam_score += $correct->question->points;

            if ($part === $correct->answer) {
                //calculate user result
                $mark += $correct->question->points;
            };
        }
         //save the quiz  result in results table
         Result::create([
            "result"  => $mark,
            "user_id" => auth()->user()->id,
            "exam_id" => session()->get('exam_id'),

        ]);

        //get the result id
        $result = Result::where('user_id', auth()->user()->id)->latest()->first();
        $result_id = $result->id;
        //save user answers in Uanswer table
        foreach ($request->except('_token') as $key => $part) {
           // echo $part."<br>";
            Uanswer::create([
                "user_answer" => $part,
                "result_id"   => $result_id,
            ]);


        }
        // dd($mark);

         //get user answer
         $uanswers    = Uanswer::where('result_id', $result_id)->get();
         //dd($uanswers );
         $answers    = Answer::all();
         $questions  = Question::where('exam_id', session()->get('exam_id'))->get();
         $count =0;
         //save in the provit table
         $user =  User::find(auth()->user()->id);
         $user->exams()->attach(session()->get('exam_id'));
         
         return view('public-site.result', compact('mark', 'exam_score', 'uanswers','answers', 'questions','count'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResultRequest  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResultRequest $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }

    //Dashboard
    public function backendindex()
    {
        $questions = Question::all();
        $answers   = Answer::all();
        $update     = false;
        return view('admin_dashboard.manage_result', compact('answers', 'questions', 'update'));
    }
    public function backendstore(StoreResultRequest $request)
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

    public function backendupdate(StoreResultRequest $request,  $id)
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
