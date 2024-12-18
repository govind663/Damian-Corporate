<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\InternationalAssociatesRequest;
use App\Models\InternationalAssociates;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class InternationalAssociatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $international_associates = InternationalAssociates::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.international_associates.index', [
            'international_associates' => $international_associates
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.international_associates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InternationalAssociatesRequest $request)
    {
        $request->validated();

        try {

            $international_associate = new InternationalAssociates();

            // ==== Upload (international_associate_image)
            if ($request->hasFile('international_associate_image')) {
                $image = $request->file('international_associate_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/international_associate/international_associate_image/'), $new_name);

                $image_path = "/damian_corporate/international_associate/international_associate_image/" . $new_name;
                $international_associate->international_associate_image = $new_name;
            }

            $international_associate->status = $request->status;
            $international_associate->inserted_at = Carbon::now();
            $international_associate->inserted_by = Auth::user()->id;
            $international_associate->save();

            return redirect()->route('international-associates.index')->with('message','International Associate has been successfully created.');

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
        $international_associate = InternationalAssociates::findOrFail($id);

        return view('backend.international_associates.edit', [
            'international_associate' => $international_associate
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InternationalAssociatesRequest $request, string $id)
    {
        $request->validated();

        try {

            $international_associate = InternationalAssociates::findOrFail($id);

            // Check and upload the banner image
            if ($request->hasFile('international_associate_image')) {
                // Delete the old image if it exists
                if ($international_associate->international_associate_image) {
                    $oldImagePath = public_path('/damian_corporate/international_associate/international_associate_image/' . $international_associate->international_associate_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('international_associate_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/international_associate/international_associate_image/'), $new_name);

                // Update the banner object with the new image path
                $international_associate->international_associate_image = $new_name;
            }

            $international_associate->status = $request->status;
            $international_associate->modified_at = Carbon::now();
            $international_associate->modified_by = Auth::user()->id;
            $international_associate->save();

            return redirect()->route('international-associates.index')->with('message', 'International Associate has been successfully updated.');

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

            $international_associate = InternationalAssociates::findOrFail($id);
            $international_associate->update($data);

            return redirect()->route('international-associates.index')->with('message','International Associate has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
