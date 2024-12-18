<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\JobPositionDetailsRequest;
use App\Models\JobPositionDetails;
use App\Http\Controllers\Controller;
use App\Models\JobPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class JobPositionDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobpositiondetails = JobPositionDetails::with('job_position')->orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.jobpositiondetails.index', [
            'jobpositiondetails' => $jobpositiondetails
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobpositions = JobPosition::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.jobpositiondetails.create', [
            'jobpositions' => $jobpositions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobPositionDetailsRequest $request)
    {
        $data = $request->validated();

        try {

            $jobpositiondetails = new JobPositionDetails();

            $jobpositiondetails->job_position_id = $request->job_position_id;
            $jobpositiondetails->requirements = json_encode($request->requirements);
            $jobpositiondetails->qualification = json_encode($request->qualification);
            $jobpositiondetails->responsibilities = json_encode($request->responsibilities);
            $jobpositiondetails->salary = json_encode($request->salary);
            $jobpositiondetails->experience = $request->experience;
            $jobpositiondetails->job_type = $request->job_type;
            $jobpositiondetails->job_location = $request->job_location;
            $jobpositiondetails->job_description = $request->job_description;
            $jobpositiondetails->status = $request->status;
            $jobpositiondetails->inserted_at = Carbon::now();
            $jobpositiondetails->inserted_by = Auth::user()->id;
            $jobpositiondetails->save();

            return redirect()->route('job-position-details.index')->with('message','Job Position Details has been successfully created.');

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
        $jobpositiondetails = JobPositionDetails::findOrFail($id);

        $jobpositions = JobPosition::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.jobpositiondetails.edit', [
            'jobpositiondetails' => $jobpositiondetails,
            'jobpositions' => $jobpositions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobPositionDetailsRequest $request, string $id)
    {
        $data = $request->validated();

        try {

            $jobpositiondetails = JobPositionDetails::findOrFail($id);

            $jobpositiondetails->job_position_id = $request->job_position_id;
            $jobpositiondetails->requirements = json_encode($request->requirements);
            $jobpositiondetails->qualification = json_encode($request->qualification);
            $jobpositiondetails->responsibilities = json_encode($request->responsibilities);
            $jobpositiondetails->salary = json_encode($request->salary);
            $jobpositiondetails->experience = $request->experience;
            $jobpositiondetails->job_type = $request->job_type;
            $jobpositiondetails->job_location = $request->job_location;
            $jobpositiondetails->job_description = $request->job_description;
            $jobpositiondetails->status = $request->status;
            $jobpositiondetails->modified_at = Carbon::now();
            $jobpositiondetails->modified_by = Auth::user()->id;
            $jobpositiondetails->save();

            return redirect()->route('job-position-details.index')->with('message','Job Position Details has been successfully updated.');

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

            $jobpositiondetails = JobPositionDetails::findOrFail($id);
            $jobpositiondetails->update($data);

            return redirect()->route('job-position-details.index')->with('message','Job Position Details has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
