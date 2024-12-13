<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CareersController extends Controller
{
    public function careers()
    {
        return view('frontend.careers');
    }
}
