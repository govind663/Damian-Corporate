<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\AwardMediaRequest;
use App\Models\AwardMedia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AwardMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $award_medias = AwardMedia::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.award_medias.index', [
            'award_medias' => $award_medias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.award_medias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AwardMediaRequest $request)
    {
        $request->validated();

        try {

            $award_media = new AwardMedia();

            // ==== Upload (award_image)
            if ($request->hasFile('award_image')) {
                $image = $request->file('award_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/award_media/award_image/'), $new_name);

                $image_path = "/damian_corporate/award_media/award_image/" . $new_name;
                $award_media->award_image = $new_name;
            }

            $award_media->description = $request->description;
            $award_media->year = $request->year;
            $award_media->status = $request->status;
            $award_media->inserted_at = Carbon::now();
            $award_media->inserted_by = Auth::user()->id;
            $award_media->save();

            return redirect()->route('awards-media.index')->with('message','Awards & Media has been successfully created.');

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
        $award_media = AwardMedia::findOrFail($id);

        return view('backend.award_medias.edit', [
            'award_media' => $award_media
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AwardMediaRequest $request, string $id)
    {
        $request->validated();

        try {

            $award_media = AwardMedia::findOrFail($id);

            // Check and upload the banner image
            if ($request->hasFile('award_image')) {
                // Delete the old image if it exists
                if ($award_media->award_image) {
                    $oldImagePath = public_path('/damian_corporate/award_media/award_image/' . $award_media->award_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('award_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/award_media/award_image/'), $new_name);

                // Update the banner object with the new image path
                $award_media->award_image = $new_name;
            }

            $award_media->description = $request->description;
            $award_media->year = $request->year;
            $award_media->status = $request->status;
            $award_media->modified_at = Carbon::now();
            $award_media->modified_by = Auth::user()->id;
            $award_media->save();

            return redirect()->route('awards-media.index')->with('message', 'Awards & Media has been successfully updated.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something went wrong while updating the Awards & Media. Please try again.');

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
            $award_media = AwardMedia::findOrFail($id);
            $award_media->update($data);

            return redirect()->route('awards-media.index')->with('message','Awards & Media has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
