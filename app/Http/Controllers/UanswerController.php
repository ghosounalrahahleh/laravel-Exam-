<?php

namespace App\Http\Controllers;

use App\Models\Uanswer;
use App\Http\Requests\StoreUanswerRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateUanswerRequest;
use App\Models\Answer;
use Illuminate\Http\Request;

class UanswerController extends Controller
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
     * @param  \App\Http\Requests\StoreUanswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUanswerRequest $request)
    {

        echo "ggggggggg";

        // $correct = Answer::all()->where('correct', 1);
        // $count = 1;
        // //dd($request);
        // $score = 0;
        // $result = 0;
        // foreach ($request->except('_token') as $key => $part) {

        //     if ($part === $correct[$count]->id) {
        //         $result = $result + $correct[$count]->question->points;
        //         $score = $score + $correct[$count]->question->points;
        //     };

        //     Uanswer::create([
        //         "user_answer" => $request->$part,
        //     ]);
        // };
        // Session::set('score',$score);
        // Session::set('result',$result);

        // return redirect()->route('results.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Uanswer  $uanswer
     * @return \Illuminate\Http\Response
     */
    public function show(Uanswer $uanswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uanswer  $uanswer
     * @return \Illuminate\Http\Response
     */
    public function edit(Uanswer $uanswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUanswerRequest  $request
     * @param  \App\Models\Uanswer  $uanswer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUanswerRequest $request, Uanswer $uanswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uanswer  $uanswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uanswer $uanswer)
    {
        //
    }
}
