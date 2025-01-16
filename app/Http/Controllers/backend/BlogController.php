<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\BlogRequest;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('blog_category')->orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.blogs.index', [
            'blogs' => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // === Pluck Blog Category
        $blogCategories = BlogCategory::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.blogs.create', [
            'blogCategories' => $blogCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $data = $request->validated();
        try {

            $blog = new Blog();

            // ==== Upload (blog_image)
            if ($request->hasFile('blog_image')) {
                $image = $request->file('blog_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/blog/blog_image/'), $new_name);

                $image_path = "/damian_corporate/blog/blog_image/" . $new_name;
                $blog->blog_image = $new_name;
            }

            $blog->blog_title = $request->blog_title;
            $blog->description = $request->description;
            $blog->blog_category_id = $request->blog_category_id;
            $blog->tags = $request->tags;
            $blog->status = $request->status;
            $blog->inserted_at = Carbon::now();
            $blog->inserted_by = Auth::user()->id;
            $blog->save();

            return redirect()->route('blogs.index')->with('message','Blog has been successfully created.');

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
        $blog = Blog::findOrFail($id);
        $tags = explode(',', $blog->tags);
        // dd($tags);
        $blogCategories = BlogCategory::orderBy("id","desc")->whereNull('deleted_at')->get();
        // dd($blogCategories);

        return view('backend.blogs.edit', [
            'blog'=> $blog,
            'blogCategories'=> $blogCategories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, string $id)
    {
        $data = $request->validated();
        try {

            $blog = Blog::findOrFail($id);

            // Check and upload the banner image
            if ($request->hasFile('blog_image')) {
                // Delete the old image if it exists
                if ($blog->blog_image) {
                    $oldImagePath = public_path('/damian_corporate/blog/blog_image/' . $blog->blog_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('blog_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/blog/blog_image/'), $new_name);

                // Update the banner object with the new image path
                $blog->blog_image = $new_name;
            }

            $blog->blog_title = $request->blog_title;
            $blog->description = $request->description;
            $blog->blog_category_id = $request->blog_category_id;
            $blog->tags = $request->tags;
            $blog->status = $request->status;
            $blog->modified_at = Carbon::now();
            $blog->modified_by = Auth::user()->id;
            $blog->save();

            return redirect()->route('blogs.index')->with('message','Blog has been successfully updated.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
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

            $blog = Blog::findOrFail($id);
            $blog->update($data);

            return redirect()->route('blogs.index')->with('message','Blog has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
