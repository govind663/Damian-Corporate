<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\CareerRequest;
use App\Models\Career;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers = Career::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.careers.index', [
            'careers' => $careers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CareerRequest $request)
    {
        $data = $request->validated();

        try {

            $career = new Career();

            // ==== Upload (careers_image)
            if ($request->hasFile('careers_image')) {
                $image = $request->file('careers_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/careers/careers_image/'), $new_name);

                $image_path = "/damian_corporate/careers/careers_image/" . $new_name;
                $career->careers_image = $new_name;
            }

            $career->description = $request->description;
            $career->inserted_at = Carbon::now();
            $career->inserted_by = Auth::user()->id;
            $career->save();

            return redirect()->route('careers.index')->with('message','Careers has been successfully created.');

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
        $career = Career::findOrFail($id);

        return view('backend.careers.edit', [
            'career' => $career
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CareerRequest $request, string $id)
    {
        $data = $request->validated();
        try {

            $career = Career::findOrFail($id);

            // Check and upload the banner image
            if ($request->hasFile('careers_image')) {
                // Delete the old image if it exists
                if ($career->careers_image) {
                    $oldImagePath = public_path('/damian_corporate/careers/careers_image/' . $career->careers_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('careers_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/careers/careers_image/'), $new_name);

                // Update the banner object with the new image path
                $career->careers_image = $new_name;
            }

            $career->description = $request->description;
            $career->modified_at = Carbon::now();
            $career->modified_by = Auth::user()->id;
            $career->save();

            return redirect()->route('careers.index')->with('message','Careers has been successfully updated.');

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

            $career = Career::findOrFail($id);
            $career->update($data);

            return redirect()->route('careers.index')->with('message','Careers has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
