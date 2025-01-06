<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\IntroductionRequest;
use App\Models\Introduction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IntroductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $introductions = Introduction::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.introductions.index', [
            'introductions' => $introductions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.introductions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IntroductionRequest $request)
    {
        $request->validated();

        try {

            $introduction = new Introduction();

            // ==== Upload (introduction_image)
            if ($request->hasFile('introduction_image')) {
                $image = $request->file('introduction_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/introduction/introduction_image/'), $new_name);

                $image_path = "/damian_corporate/introduction/introduction_image/" . $new_name;
                $introduction->introduction_image = $new_name;
            }

            $introduction->title = $request->title;
            $introduction->description = $request->description;
            $introduction->status = $request->status;
            $introduction->inserted_at = Carbon::now();
            $introduction->inserted_by = Auth::user()->id;
            $introduction->save();

            return redirect()->route('introduction.index')->with('message','Introduction has been successfully created.');

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
        $introduction = Introduction::findOrFail($id);

        return view('backend.introductions.edit', [
            'introduction' => $introduction
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IntroductionRequest $request, string $id)
    {
        $request->validated();

        try {

            $introduction = Introduction::findOrFail($id);

            // Check and upload the banner image
            if ($request->hasFile('introduction_image')) {
                // Delete the old image if it exists
                if ($introduction->introduction_image) {
                    $oldImagePath = public_path('/damian_corporate/introduction/introduction_image/' . $introduction->introduction_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('introduction_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/introduction/introduction_image/'), $new_name);

                // Update the banner object with the new image path
                $introduction->introduction_image = $new_name;
            }

            $introduction->title = $request->title;
            $introduction->description = $request->description;
            $introduction->status = $request->status;
            $introduction->modified_at = Carbon::now();
            $introduction->modified_by = Auth::user()->id;
            $introduction->save();

            return redirect()->route('introduction.index')->with('message', 'Introduction has been successfully updated.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something went wrong while updating the introduction. Please try again.');

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

            $introduction = Introduction::findOrFail($id);
            $introduction->update($data);

            return redirect()->route('introduction.index')->with('message','Introduction has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
