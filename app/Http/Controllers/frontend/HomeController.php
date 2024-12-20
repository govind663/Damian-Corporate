<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CompanyInformation;
use App\Models\Introduction;
use App\Models\OurServices;
use App\Models\Project;
use App\Models\ProjectDetails;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $banners = Banner::orderBy("id","desc")->whereNull('deleted_at')->first();

        $introductions = Introduction::orderBy("id","desc")->where('status',1)->whereNull('deleted_at')->first();

        $testimonials = Testimonial::orderBy("id","desc")->where('status',1)->whereNull('deleted_at')->get();

        $projects = Project::with('category')->orderBy("id","desc")->where('status',1)->whereNull('deleted_at')->paginate(9);

        $ourServices = OurServices::orderBy("id","desc")->where('status',1)->whereNull('deleted_at')->get();

        return view('frontend.home', [
            'banners' => $banners,
            'introductions' => $introductions,
            'testimonials' => $testimonials,
            'projects' => $projects,
            'ourServices' => $ourServices,
        ]);
    }


    public function projectDetails($slug)
    {
        $project = Project::with('category')->where('slug', $slug)->where('status',1)->whereNull('deleted_at')->first();
        // dd($project);

        // === Fetch ProjectDetails with the Slug ===
        $projectDetails = ProjectDetails::with('project')->where('slug', $slug)->orderBy("id","desc")->whereNull('deleted_at')->first();
        // dd($projectDetails);

        return view('frontend.project_details', [
            'project' => $project,
            'projectDetails' => $projectDetails,
        ]);
    }

}
