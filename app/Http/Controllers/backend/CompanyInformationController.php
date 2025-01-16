<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\CompanyInformationRequest;
use App\Models\CompanyInformation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CompanyInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company_informations = CompanyInformation::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.company_informations.index', [
            'company_informations' => $company_informations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.company_informations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyInformationRequest $request)
    {
        $request->validated();

        try {

            $company_information = new CompanyInformation();

            // ==== Upload (company_logo)
            if ($request->hasFile('company_logo')) {
                $image = $request->file('company_logo');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/company_information/company_logo/'), $new_name);

                $image_path = "/damian_corporate/company_information/company_logo/" . $new_name;
                $company_information->company_logo = $new_name;
            }

            $company_information->company_description = $request->company_description;

            // === stored in Json format ===
            $company_information->company_address = json_encode($request->company_address);
            $company_information->location_name = json_encode($request->location_name);
            $company_information->location_link = json_encode($request->location_link);

            $company_information->company_phone = $request->company_phone;
            $company_information->company_email = $request->company_email;
            $company_information->inserted_at = Carbon::now();
            $company_information->inserted_by = Auth::user()->id;
            $company_information->save();

            return redirect()->route('companyInformation.index')->with('message','Company Information has been successfully created.');

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
        $company_information = CompanyInformation::findOrFail($id);

        return view('backend.company_informations.edit', [
            'company_information' => $company_information
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyInformationRequest $request, string $id)
    {
        $request->validated();

        try {

            $company_information = CompanyInformation::findOrFail($id);

            // Check and upload the banner image
            if ($request->hasFile('company_logo')) {
                // Delete the old image if it exists
                if ($company_information->company_logo) {
                    $oldImagePath = public_path('/damian_corporate/company_information/company_logo/' . $company_information->company_logo);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('company_logo');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/company_information/company_logo/'), $new_name);

                // Update the banner object with the new image path
                $company_information->company_logo = $new_name;
            }

            $company_information->company_description = $request->company_description;
            // === stored in Json format ===
            $company_information->company_address = json_encode($request->company_address);
            $company_information->location_name = json_encode($request->location_name);
            $company_information->location_link = json_encode($request->location_link);

            $company_information->company_phone = $request->company_phone;
            $company_information->company_email = $request->company_email;
            $company_information->modified_at = Carbon::now();
            $company_information->modified_by = Auth::user()->id;
            $company_information->save();

            return redirect()->route('companyInformation.index')->with('message', 'Company Information has been successfully updated.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something went wrong while updating the Company Information. Please try again.');

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

            $company_information = CompanyInformation::findOrFail($id);
            $company_information->update($data);

            return redirect()->route('companyInformation.index')->with('message','Company Information has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
