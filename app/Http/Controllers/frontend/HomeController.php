<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\sendSubscribeUsMailRequest;
use App\Models\Banner;
use App\Models\sendSubscribeUsMail as ModelsSendSubscribeUsMail;
use App\Models\Introduction;
use App\Models\OurServices;
use App\Models\Project;
use App\Models\ProjectDetails;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendSubscribeUsMail;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {

        $banners = Banner::orderBy("id","desc")->whereNull('deleted_at')->first();

        $introductions = Introduction::orderBy("id","desc")->where('status',1)->whereNull('deleted_at')->first();

        $testimonials = Testimonial::orderBy("id","desc")->where('status',1)->whereNull('deleted_at')->get();

        $projects = Project::with('category')->orderBy("id","asc")->where('status',1)->whereNull('deleted_at')->paginate(11);

        $ourServices = OurServices::orderBy("id","asc")->where('status',1)->whereNull('deleted_at')->get();

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

        if (!$project) {
            abort(404); // Handle the case where the project is not found
        }

        // === Fetch ProjectDetails with the Slug ===
        $projectDetails = ProjectDetails::with('project')
                            ->where('slug', $slug)
                            ->orderBy("id","desc")
                            ->whereNull('deleted_at')
                            ->first();
        // dd($projectDetails);

        if (!$projectDetails) {
            abort(404); // Handle the case where the projectDetails is not found
        }

        $banner_image = $projectDetails->banner_image;

        // Fetch related projects based on the category
        $relatedProjects = Project::with('category')
                                ->where('category_id', $project->category->id)
                                ->where('id', '!=', $project->id) // Exclude the current project
                                ->where('status', 1)
                                ->whereNull('deleted_at')
                                ->limit(6) // Limit the number of related projects
                                ->get();

        return view('frontend.project_details', [
            'project' => $project,
            'projectDetails' => $projectDetails,
            'banner_image' => $banner_image,
            'relatedProjects' => $relatedProjects
        ]);
    }

    // === subscribe-newsletter ===
    public function subscribeNewsletter(sendSubscribeUsMailRequest $request)
    {
        $data = $request->validated();

        try {

            $memberDetail = new ModelsSendSubscribeUsMail();

            $memberDetail->email = $request->email_id;
            $memberDetail->inserted_at = Carbon::now();
            $memberDetail->save();

            $update = [
                'inserted_by' => $memberDetail->id,
            ];

            ModelsSendSubscribeUsMail::where('id', $memberDetail->id)->update($update);

            // Send Mail
            $mailData = [
                'email' => $request->email_id,
            ];

            // Send Mail with attachments
            Mail::to('codingthunder1997@gmail.com', 'Damian Corporate')
                ->cc(['shweta@matrixbricks.com', 'codingthunder1997@gmail.com','riddhi@matrixbricks.com'])
                ->send(new sendSubscribeUsMail($mailData));

            return redirect()->back()->with('message','Thank you for subscribing us. We will send you our latest updates.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }
}
