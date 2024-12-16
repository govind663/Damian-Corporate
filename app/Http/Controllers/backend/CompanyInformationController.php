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

            $company_information->company_description = $request->company_description;
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
        //
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
