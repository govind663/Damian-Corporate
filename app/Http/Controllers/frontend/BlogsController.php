<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function blogs()
    {
        // ===== Fetch Blog Categories
        $blogCategories = BlogCategory::orderBy("id","asc")->whereNull('deleted_at')->get();

        // ===== Fetch Blogs
        $blogs = Blog::with('blog_category')->orderBy("id","ASC")->whereNull('deleted_at')->paginate(3);;

        return view('frontend.blogs', [
            'blogCategories' => $blogCategories,
            'blogs' => $blogs
        ]);
    }

    public function blog_details(Request $request, $id)
    {
        // ===== Fetch Blog Categories
        $blogCategories = BlogCategory::orderBy("id","asc")->whereNull('deleted_at')->get();

        // ===== Fetch Blog
        $blogs = Blog::findOrFail($id);

        $tags = explode(',', $blogs->tags);
        // dd($tags);

        // Get latest 5 blog entries
        $latestPosts = Blog::orderBy('inserted_at', 'ASC')->limit(3)->get();

        return view('frontend.blog_details', [
            'blogCategories' => $blogCategories,
            'blogs' => $blogs,
            'tags' => $tags,
            'latestPosts' => $latestPosts
        ]);
    }
}
