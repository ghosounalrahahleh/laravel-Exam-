<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class ExamController extends Controller
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
     * @param  \App\Http\Requests\StoreExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {$categories = Category::all();
        $exams = Exam::where('category_id',$id)->paginate(3);
        //dd($exams);
        return view('public-site.exams',compact('exams','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamRequest  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }

    // =================================================================
    // =                             Backend                           =
    // =================================================================

    public function backendindex()
    {
        $exams      = Exam::all();
        $categories = Category::all();
        $update     = false;
        return view('admin_dashboard.manage_exam', compact('categories', 'exams', 'update'));
    }

    public function backendstore(StoreExamRequest $request)
    {
        $this->validate($request, [
            'title'         => 'required|max:250',
            'category_name' => 'required|max:250',
        ]);

        Exam::create([
            "title"       => $request->title,
            "category_id" => $request->category_name
        ]);
        return redirect()->back();
    }

    public function backendedit($id)
    {
        $update     = true;
        $categories = Category::all();
        $exam       = Exam::find($id);
        $exams      =  Exam::all();
        return view('admin_dashboard.manage_exam', compact('exams', 'categories', 'exam', 'update'));
    }



    public function backendupdate(UpdateExamRequest $request,  $id)
    {
        $exam              = Exam::find($id);
        $exam->title       = $request->title;
        $exam->category_id = $request->category_name;
        $exam->update();
        return redirect()->route('exams.index');
    }

    public function backenddestroy($request)
    {
        $exam = Exam::find($request);
        $exam->delete();
        return redirect()->route('exams.index');
    }


    public function search(Request $request)
    {    $categories = Category::all();
        // Get the search value from the request
        $search = $request->input('search');
        // Search in the title and body columns from the owner table
        $exams = Exam::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(3);

        return view('public-site.search', compact('exams','categories'));
    }
}
