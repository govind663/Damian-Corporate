<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\AboutCareerRequest;
use App\Models\AboutCareer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AboutCareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutcareers = AboutCareer::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.aboutcareers.index', [
            'aboutcareers' => $aboutcareers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.aboutcareers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutCareerRequest $request)
    {
        $data = $request->validated();

        try {

            $aboutcareer = new AboutCareer();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/aboutcareer/image/'), $new_name);

                $image_path = "/damian_corporate/aboutcareer/image/" . $new_name;
                $aboutcareer->image = $new_name;
            }

            $aboutcareer->title = $request->title;
            $aboutcareer->short_description = json_encode($request->short_description);
            $aboutcareer->description = $request->description;
            $aboutcareer->inserted_at = Carbon::now();
            $aboutcareer->inserted_by = Auth::user()->id;
            $aboutcareer->save();

            return redirect()->route('about-careers.index')->with('message','About Careers has been successfully created.');

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
        $aboutcareer = AboutCareer::findOrFail($id);

        return view('backend.aboutcareers.edit', [
            'aboutcareer' => $aboutcareer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutCareerRequest $request, string $id)
    {
        $data = $request->validated();

        try {

            $aboutcareer = AboutCareer::findOrFail($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($aboutcareer->image) {
                    $oldImagePath = public_path('/damian_corporate/aboutcareer/image/' . $aboutcareer->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/aboutcareer/image/'), $new_name);

                // Update the banner object with the new image path
                $aboutcareer->image = $new_name;
            }

            $aboutcareer->title = $request->title;
            $aboutcareer->short_description = json_encode($request->short_description);
            $aboutcareer->description = $request->description;
            $aboutcareer->modified_at = Carbon::now();
            $aboutcareer->modified_by = Auth::user()->id;
            $aboutcareer->save();

            return redirect()->route('about-careers.index')->with('message','About Careers has been successfully updated.');

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

            $aboutcareer = AboutCareer::findOrFail($id);
            $aboutcareer->update($data);

            return redirect()->route('about-careers.index')->with('message','About Careers has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
