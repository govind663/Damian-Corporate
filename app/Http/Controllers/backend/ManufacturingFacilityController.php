<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\ManufacturingFacilityRequest;
use App\Models\ManufacturingFacility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ManufacturingFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manufacturing_facilities = ManufacturingFacility::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.manufacturing-facilities.index', [
            'manufacturing_facilities' => $manufacturing_facilities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.manufacturing-facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ManufacturingFacilityRequest $request)
    {
        $request->validated();

        try {

            $manufacturing_facility = new ManufacturingFacility();

            // ==== Upload (manufacturing_facilitie_image)
            if ($request->hasFile('manufacturing_facilitie_image')) {
                $image = $request->file('manufacturing_facilitie_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/manufacturing_facility/manufacturing_facilitie_image/'), $new_name);

                $image_path = "/damian_corporate/manufacturing_facility/manufacturing_facilitie_image/" . $new_name;
                $manufacturing_facility->manufacturing_facilitie_image = $new_name;
            }

            $manufacturing_facility->status = $request->status;
            $manufacturing_facility->inserted_at = Carbon::now();
            $manufacturing_facility->inserted_by = Auth::user()->id;
            $manufacturing_facility->save();

            return redirect()->route('manufacturing-facility.index')->with('message','Manufacturing Facility has been successfully created.');

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
        $manufacturing_facility = ManufacturingFacility::findOrFail($id);

        return view('backend.manufacturing-facilities.edit', [
            'manufacturing_facility' => $manufacturing_facility
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ManufacturingFacilityRequest $request, string $id)
    {
        $request->validated();

        try {

            $manufacturing_facility = ManufacturingFacility::findOrFail($id);

            // Check and upload the banner image
            if ($request->hasFile('manufacturing_facilitie_image')) {
                // Delete the old image if it exists
                if ($manufacturing_facility->manufacturing_facilitie_image) {
                    $oldImagePath = public_path('/damian_corporate/manufacturing_facility/manufacturing_facilitie_image/' . $manufacturing_facility->manufacturing_facilitie_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('manufacturing_facilitie_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/manufacturing_facility/manufacturing_facilitie_image/'), $new_name);

                // Update the banner object with the new image path
                $manufacturing_facility->manufacturing_facilitie_image = $new_name;
            }

            $manufacturing_facility->status = $request->status;
            $manufacturing_facility->modified_at = Carbon::now();
            $manufacturing_facility->modified_by = Auth::user()->id;
            $manufacturing_facility->save();

            return redirect()->route('manufacturing-facility.index')->with('message', 'Manufacturing Facility has been successfully updated.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something went wrong while updating the Manufacturing Facility. Please try again.');

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

            $manufacturing_facility = ManufacturingFacility::findOrFail($id);
            $manufacturing_facility->update($data);

            return redirect()->route('manufacturing-facility.index')->with('message','Manufacturing Facility has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
