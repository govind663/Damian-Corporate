<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function blogs()
    {
        return view('frontend.blogs');
    }

    public function blog_details($slug)
    {
        $data['slug'] = $slug;
        return view('frontend.blog_details', ['data' => $data]);
    }
}
