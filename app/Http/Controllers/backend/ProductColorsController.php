<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\ProductColorsRequest;
use App\Models\ProductColors;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = ProductColors::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.product.colors.index', [
            'colors' => $colors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.product.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductColorsRequest $request)
    {
        $request->validated();
        try {

            $productColors = new ProductColors();

            $productColors->name = $request->name;
            $productColors->inserted_at = Carbon::now();
            $productColors->inserted_at = Carbon::now();
            $productColors->inserted_by = Auth::user()->id;
            $productColors->save();

            return redirect()->route('product-colors.index')->with('message','Product Color has been successfully created.');

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
        $productColors = ProductColors::findOrFail($id);

        return view('backend.product.colors.edit', [
            'productColors' => $productColors
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductColorsRequest $request, string $id)
    {
        $request->validated();
        try {

            $productColors = ProductColors::findOrFail($id);

            $productColors->name = $request->name;
            $productColors->modified_at = Carbon::now();
            $productColors->modified_by = Auth::user()->id;
            $productColors->save();

            return redirect()->route('product-colors.index')->with('message', 'Product Color has been successfully updated.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something went wrong while updating the category. Please try again.');

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

            $productColors = ProductColors::findOrFail($id);
            $productColors->update($data);

            return redirect()->route('product-colors.index')->with('message','Product Color has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
