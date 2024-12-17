<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\BlogCategoryRequest;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogCategories = BlogCategory::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.blog-categories.index', [
            'blogCategories' => $blogCategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.blog-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCategoryRequest $request)
    {
        $request->validated();

        try {

            $blogCategory = new BlogCategory();
            $blogCategory->category_name = $request->category_name;
            $blogCategory->inserted_at = Carbon::now();
            $blogCategory->inserted_by = Auth::user()->id;
            $blogCategory->save();

            return redirect()->route('blog-category.index')->with('message','Blog Category has been successfully created.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blogCategory = BlogCategory::findOrFail($id);

        return view('backend.blog-categories.edit', [
            'blogCategory' => $blogCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCategoryRequest $request, string $id)
    {
        $request->validated();

        try {

            $blogCategory = BlogCategory::findOrFail($id);

            $blogCategory->category_name = $request->category_name;
            $blogCategory->modified_at = Carbon::now();
            $blogCategory->modified_by = Auth::user()->id;
            $blogCategory->save();

            return redirect()->route('blog-category.index')->with('message', 'Blog Category has been successfully updated.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something went wrong while updating the Blog Category. Please try again.');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {

            $blogCategory = BlogCategory::findOrFail($id);
            $blogCategory->update($data);

            return redirect()->route('blog-category.index')->with('message','Blog Category has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
