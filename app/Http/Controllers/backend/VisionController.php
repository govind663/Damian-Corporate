<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\VisionRequest;
use App\Models\Vision;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visions = Vision::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.visions.index', [
            'visions' => $visions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.visions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VisionRequest $request)
    {
        $request->validated();

        try {

            $vision = new Vision();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/visions/image/'), $new_name);

                $image_path = "/damian_corporate/visions/image/" . $new_name;
                $vision->image = $new_name;
            }

            $vision->title = $request->title;
            $vision->description = $request->description;
            $vision->sub_title = json_encode($request->sub_title);
            $vision->sub_description = json_encode($request->sub_description);
            $vision->status = $request->status;
            $vision->inserted_at = Carbon::now();
            $vision->inserted_by = Auth::user()->id;
            $vision->save();

            return redirect()->route('vision.index')->with('message','Vision has been successfully created.');

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
        $vision = Vision::findOrFail($id);

        return view('backend.visions.edit', [
            'vision' => $vision
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VisionRequest $request, string $id)
    {
        $request->validated();

        try {

            $vision = Vision::findOrFail($id);

            // Check and upload the banner image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($vision->image) {
                    $oldImagePath = public_path('/damian_corporate/visions/image/' . $vision->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/visions/image/'), $new_name);

                // Update the banner object with the new image path
                $vision->image = $new_name;
            }

            $vision->title = $request->title;
            $vision->description = $request->description;
            $vision->sub_title = json_encode($request->sub_title);
            $vision->sub_description = json_encode($request->sub_description);
            $vision->status = $request->status;
            $vision->modified_at = Carbon::now();
            $vision->modified_by = Auth::user()->id;
            $vision->save();

            return redirect()->route('vision.index')->with('message', 'Vision has been successfully updated.');

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

            $vision = Vision::findOrFail($id);
            $vision->update($data);

            return redirect()->route('vision.index')->with('message','Vision has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
