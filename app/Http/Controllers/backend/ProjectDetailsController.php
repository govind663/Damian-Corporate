<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\ProjectDetailsRequest;
use App\Models\Project;
use App\Models\ProjectDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProjectDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectDetails = ProjectDetails::with('project')->orderBy("id","desc")->whereNull('deleted_at')->get();
        // dd($projects);

        return view('backend.projects-details.index', [
            'projectDetails' => $projectDetails
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.projects-details.create', [
            'projects' => $projects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectDetailsRequest $request)
    {
        $request->validated();

        try {

            $projectDetail = new ProjectDetails();

            // Delete existing images
            if (!empty($bannerImagePaths)) {
                foreach ($bannerImagePaths as $existingImage) {
                    $existingImagePath = public_path('/damian_corporate/project_details/banner_image/' . $existingImage);
                    if (File::exists($existingImagePath)) {
                        File::delete($existingImagePath); // Delete the image file
                    }
                }
            }

            // Clear the array of existing images
            $bannerImagePaths = [];

            // Check if new images are uploaded
            if ($request->hasFile('banner_image')) {
                // Add new images to the paths array
                foreach ($request->file('banner_image') as $image) {
                    // Validate the image before processing (add your validation rules)
                    $new_name = Str::uuid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/damian_corporate/project_details/banner_image'), $new_name);
                    $bannerImagePaths[] = $new_name; // Add the new image to the array
                }
            }

            // Update the banner_image with the new image paths
            $projectDetail->banner_image = json_encode($bannerImagePaths);

            $projectDetail->project_id = $request->project_id;
            $projectDetail->slug = $request->slug;
            $projectDetail->location = $request->location;
            $projectDetail->location_url = $request->location_url;
            $projectDetail->total_constructed_area = $request->total_constructed_area;
            $projectDetail->project_description = $request->project_description;
            $projectDetail->inserted_at = Carbon::now();
            $projectDetail->inserted_by = Auth::user()->id;
            $projectDetail->save();

            return redirect()->route('project-details.index')->with('message','Project Details has been successfully created.');

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
        $projectDetails = ProjectDetails::findOrFail($id);
        $bannerImages = $projectDetails->banner_image;
        $projects = Project::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.projects-details.edit', [
            'projectDetails' => $projectDetails,
            'bannerImages' => $bannerImages,
            'projects' => $projects
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectDetailsRequest $request, string $id)
    {
        $request->validated();
        try {

            $projectDetail = ProjectDetails::findOrFail($id);

            $bannerImagePaths = json_decode($projectDetail->banner_image, true);

            // Update banner_image
            if ($request->hasFile('banner_image')) {
                // Delete existing images
                if (!empty($bannerImagePaths)) {
                    foreach ($bannerImagePaths as $existingImage) {
                        $existingImagePath = public_path('/damian_corporate/project_details/banner_image/' . $existingImage);
                        if (File::exists($existingImagePath)) {
                            File::delete($existingImagePath); // Delete the image file
                        }
                    }
                }

                // Clear the array of existing images
                $bannerImagePaths = [];

                // Add new images to the paths array
                foreach ($request->file('banner_image') as $image) {
                    // Validate the image before processing (add your validation rules)
                    $new_name = Str::uuid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/damian_corporate/project_details/banner_image/'), $new_name);
                    $bannerImagePaths[] = $new_name; // Add the new image to the array
                }

                // Update the banner_image with the new image paths
                $projectDetail->banner_image = json_encode($bannerImagePaths);
            }

            $projectDetail->project_id = $request->project_id;
            $projectDetail->slug = $request->slug;
            $projectDetail->location = $request->location;
            $projectDetail->location_url = $request->location_url;
            $projectDetail->total_constructed_area = $request->total_constructed_area;
            $projectDetail->project_description = $request->project_description;
            $projectDetail->modified_at = Carbon::now();
            $projectDetail->modified_by = Auth::user()->id;
            $projectDetail->save();

            return redirect()->route('project-details.index')->with('message', 'Project Details has been successfully updated.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something went wrong while updating the project details. Please try again.');

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

            $projectDetails = ProjectDetails::findOrFail($id);
            $projectDetails->update($data);

            return redirect()->route('project-details.index')->with('message','Projec Details has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }

    public function fetchProjectSlug(Request $request)
    {
        $project = Project::find($request->projectId);
        $slug = $project->slug;

        if ($project) {
            return response()->json(['slug' => $slug]);
        } else {
            return response()->json(['slug' => null]);
        }
    }
}
