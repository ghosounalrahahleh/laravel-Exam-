<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Exam;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(3);
        $exams      = Exam::all();
        session()->put('exam_id', '');
        return view('public-site.categories', compact('categories', 'exams'));
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
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $exams      = Exam::where('category_id', $id)->paginate(3);
        return view('public-site.singleCategoey', compact('exams', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    // =================================================================
    // =                             Backend                           =
    // =================================================================

    public function backendindex()
    {
        $categories = Category::all();
        $update     = false;
        return view('admin_dashboard.manage_categories', compact('categories', 'update'));
    }
    public function backendstore(StoreCategoryRequest $request)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
            'image' => 'required|mimes:jpeg,png,gif,jpg',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('storage/category_images/', $new_file);
        }
        Category::create([
            "name" => $request->name,
            "image" => 'storage/category_images/' . $new_file
        ]);
        return redirect()->back();
    }

    public function backendedit($id)
    {
        $update     = true;
        $categories = Category::all();
        $category   = Category::find($id);
        return view('admin_dashboard.manage_categories', compact('categories', 'category', 'update'));
    }

    public function backenddestroy($request)
    {
        $category = Category::find($request);
        $category->delete();
        return redirect()->route('category.index');
    }

    public function backendupdate(UpdateCategoryRequest $request,  $id)
    {
        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('storage/category_images/', $new_file);
            $category->image = 'storage/category_images/' . $new_file;
        }
        $category->name = $request->name;


        $category->update();
        return redirect()->route('category.index');
    }
}
