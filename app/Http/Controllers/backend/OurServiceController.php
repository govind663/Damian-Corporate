<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\OurServiceRequest;
use App\Models\OurServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OurServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ourServices = OurServices::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.our-services.index', [
            'ourServices' => $ourServices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.our-services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OurServiceRequest $request)
    {
        $request->validated();

        try {

            $ourService = new OurServices();

            // ==== Upload (service_image)
            if ($request->hasFile('service_image')) {
                $image = $request->file('service_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/our_service/service_image/'), $new_name);

                $image_path = "/damian_corporate/our_service/service_image/" . $new_name;
                $ourService->service_image = $new_name;
            }

            // ==== Upload (service_logo)
            if ($request->hasFile('service_logo')) {
                $image = $request->file('service_logo');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/our_service/service_logo/'), $new_name);

                $image_path = "/damian_corporate/our_service/service_logo/" . $new_name;
                $ourService->service_logo = $new_name;
            }

            $ourService->service_title = $request->service_title;
            $ourService->service_description = $request->service_description;
            $ourService->status = $request->status;
            $ourService->inserted_at = Carbon::now();
            $ourService->inserted_by = Auth::user()->id;
            $ourService->save();

            return redirect()->route('our-services.index')->with('message','Our Service has been successfully created.');

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
        $ourService = OurServices::findOrFail($id);

        return view('backend.our-services.edit', [
            'ourService' => $ourService
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OurServiceRequest $request, string $id)
    {
        $request->validated();

        try {

            $ourService = OurServices::findOrFail($id);

            // Check and upload the banner image
            if ($request->hasFile('service_image')) {
                // Delete the old image if it exists
                if ($ourService->service_image) {
                    $oldImagePath = public_path('/damian_corporate/our_service/service_image/' . $ourService->service_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('service_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/our_service/service_image/'), $new_name);

                // Update the banner object with the new image path
                $ourService->service_image = $new_name;
            }


            // Check and upload the banner image
            if ($request->hasFile('service_logo')) {
                // Delete the old image if it exists
                if ($ourService->service_logo) {
                    $oldImagePath = public_path('/damian_corporate/our_service/service_logo/' . $ourService->service_logo);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('service_logo');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/our_service/service_logo/'), $new_name);

                // Update the banner object with the new image path
                $ourService->service_logo = $new_name;
            }

            $ourService->service_title = $request->service_title;
            $ourService->service_description = $request->service_description;
            $ourService->status = $request->status;
            $ourService->modified_at = Carbon::now();
            $ourService->modified_by = Auth::user()->id;
            $ourService->save();

            return redirect()->route('our-services.index')->with('message', 'Our Service has been successfully updated.');

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

            $ourService = OurServices::findOrFail($id);
            $ourService->update($data);

            return redirect()->route('our-services.index')->with('message','Our Service has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
