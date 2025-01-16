<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\TestimonialRequest;
use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.testimonials.index', [
            'testimonials' => $testimonials
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialRequest $request)
    {
        $request->validated();

        try {

            $testimonial = new Testimonial();

            $testimonial->name = $request->name;
            $testimonial->designation = $request->designation;
            $testimonial->description = $request->description;
            $testimonial->status = $request->status;
            $testimonial->inserted_at = Carbon::now();
            $testimonial->inserted_by = Auth::user()->id;
            $testimonial->save();

            return redirect()->route('testimonial.index')->with('message','Testimonial has been successfully created.');

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
        $testimonial = Testimonial::findOrFail($id);

        return view('backend.testimonials.edit', [
            'testimonial' => $testimonial
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialRequest $request, string $id)
    {
        $request->validated();

        try {

            $testimonial = Testimonial::findOrFail($id);

            $testimonial->name = $request->name;
            $testimonial->designation = $request->designation;
            $testimonial->description = $request->description;
            $testimonial->status = $request->status;
            $testimonial->modified_at = Carbon::now();
            $testimonial->modified_by = Auth::user()->id;
            $testimonial->save();

            return redirect()->route('testimonial.index')->with('message', 'Testimonial has been successfully updated.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something went wrong while updating the testimonial. Please try again.');

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

            $testimonial = Testimonial::findOrFail($id);
            $testimonial->update($data);

            return redirect()->route('testimonial.index')->with('message','Testimonial has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
