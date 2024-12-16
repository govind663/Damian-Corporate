<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\ProjectRequest;
use App\Models\Category;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('category')->orderBy("id","desc")->whereNull('deleted_at')->get();
        // dd($projects);
        return view('backend.projects.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.projects.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $request->validated();
        try {

            $project = new Project();

            // ==== Upload (project_image)
            if ($request->hasFile('project_image')) {
                $image = $request->file('project_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/project/project_image'), $new_name);

                $image_path = "/damian_corporate/project/project_image/" . $new_name;
                $project->project_image = $new_name;
            }

            $project->project_name = $request->project_name;
            $project->slug = $request->slug;
            $project->category_id = $request->category_id;
            $project->status = $request->status;
            $project->inserted_at = Carbon::now();
            $project->inserted_by = Auth::user()->id;
            $project->save();

            return redirect()->route('project.index')->with('message','Project has been successfully created.');

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
        $project = Project::findOrFail($id);

        $categories = Category::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.projects.edit', [
            'project' => $project,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, string $id)
    {
        $request->validated();
        try {

            $project = Project::findOrFail($id);

            // Check and upload the project image
            if ($request->hasFile('project_image')) {
                // Delete the old image if it exists
                if ($project->project_image) {
                    $oldImagePath = public_path('/damian_corporate/project/project_image/' . $project->project_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('project_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/project/project_image/'), $new_name);

                // Update the banner object with the new image path
                $project->project_image = $new_name;
            }

            $project->project_name = $request->project_name;
            $project->slug = $request->slug;
            $project->category_id = $request->category_id;
            $project->status = $request->status;
            $project->modified_at = Carbon::now();
            $project->modified_by = Auth::user()->id;
            $project->save();

            return redirect()->route('project.index')->with('message', 'Project has been successfully updated.');

        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Something went wrong while updating the project. Please try again.');
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

            $project = Project::findOrFail($id);
            $project->update($data);

            return redirect()->route('project.index')->with('message','Project has been successfully deleted.');
        } catch(\Exception $ex){
            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
