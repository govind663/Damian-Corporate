<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CompanyInformation;
use App\Models\Introduction;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $banners = Banner::orderBy("id","desc")->whereNull('deleted_at')->first();

        $introductions = Introduction::orderBy("id","desc")->where('status',1)->whereNull('deleted_at')->first();

        $testimonials = Testimonial::orderBy("id","desc")->where('status',1)->whereNull('deleted_at')->get();


        return view('frontend.home', [
            'banners' => $banners,
            'introductions' => $introductions,
            'testimonials' => $testimonials,
        ]);
    }
}
