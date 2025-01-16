<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\JobPositionRequest;
use App\Models\JobPosition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class JobPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $job_positions = JobPosition::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.job_positions.index', [
            'job_positions' => $job_positions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.job_positions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobPositionRequest $request)
    {
        $request->validated();
        try {

            $job_position = new JobPosition();

            $job_position->job_title = $request->job_title;
            $job_position->inserted_at = Carbon::now();
            $job_position->inserted_by = Auth::user()->id;
            $job_position->save();

            return redirect()->route('job-position.index')->with('message','Job Position has been successfully created.');

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
        $job_position = JobPosition::findOrFail($id);

        return view('backend.job_positions.edit', [
            'job_position' => $job_position,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobPositionRequest $request, string $id)
    {
        $request->validated();

        try {

            $job_position = JobPosition::findOrFail($id);

            $job_position->job_title = $request->job_title;
            $job_position->modified_at = Carbon::now();
            $job_position->modified_by = Auth::user()->id;
            $job_position->save();

            return redirect()->route('job-position.index')->with('message', 'Job Position has been successfully updated.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something went wrong while updating the category. Please try again.');

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

            $job_position = JobPosition::findOrFail($id);
            $job_position->update($data);

            return redirect()->route('job-position.index')->with('message','Job Position has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
