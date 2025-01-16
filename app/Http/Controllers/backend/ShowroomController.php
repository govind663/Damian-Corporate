<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\ShowroomRequest;
use App\Models\Showroom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ShowroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showrooms = Showroom::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.showrooms.index', [
            'showrooms' => $showrooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.showrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShowroomRequest $request)
    {
        $request->validated();

        try {

            $showroom = new Showroom();

            // ==== Upload (office_image)
            if ($request->hasFile('office_image')) {
                $image = $request->file('office_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/showroom/office_image/'), $new_name);

                $image_path = "/damian_corporate/showroom/office_image/" . $new_name;
                $showroom->office_image = $new_name;
            }

            $showroom->office_name = $request->office_name;
            $showroom->office_location = $request->office_location;
            $showroom->location_link = $request->location_link;
            $showroom->status = $request->status;
            $showroom->inserted_at = Carbon::now();
            $showroom->inserted_by = Auth::user()->id;
            $showroom->save();

            return redirect()->route('showroom.index')->with('message','Showroom has been successfully created.');

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
        $showroom = Showroom::findOrFail($id);

        return view('backend.showrooms.edit', [
            'showroom' => $showroom
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShowroomRequest $request, string $id)
    {
        $request->validated();

        try {

            $showroom = Showroom::findOrFail($id);

            // Check and upload the banner image
            if ($request->hasFile('office_image')) {
                // Delete the old image if it exists
                if ($showroom->office_image) {
                    $oldImagePath = public_path('/damian_corporate/showroom/office_image/' . $showroom->office_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('office_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/showroom/office_image/'), $new_name);

                // Update the banner object with the new image path
                $showroom->office_image = $new_name;
            }

            $showroom->office_name = $request->office_name;
            $showroom->office_location = $request->office_location;
            $showroom->location_link = $request->location_link;
            $showroom->status = $request->status;
            $showroom->modified_at = Carbon::now();
            $showroom->modified_by = Auth::user()->id;
            $showroom->save();

            return redirect()->route('showroom.index')->with('message', 'Showroom has been successfully updated.');

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

            $showroom = Showroom::findOrFail($id);
            $showroom->update($data);

            return redirect()->route('showroom.index')->with('message','Showroom has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
