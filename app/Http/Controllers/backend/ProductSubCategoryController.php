<?php

namespace App\Http\Controllers\backend;

use App\Models\ProductSubCategory;
use App\Http\Requests\backend\ProductSubCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = ProductSubCategory::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.product.subcategories.index', [
            'subcategories' => $subcategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.product.subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductSubCategoryRequest $request)
    {
        $request->validated();
        try {

            $category = new ProductSubCategory();

            $category->name = $request->name;
            $category->inserted_at = Carbon::now();
            $category->inserted_at = Carbon::now();
            $category->inserted_by = Auth::user()->id;
            $category->save();

            return redirect()->route('product-sub-category.index')->with('message','Product Sub Category has been successfully created.');

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
        $subcategory = ProductSubCategory::findOrFail($id);

        return view('backend.product.subcategories.edit', [
            'subcategory' => $subcategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductSubCategoryRequest $request, string $id)
    {
        $request->validated();
        try {

            $category = ProductSubCategory::findOrFail($id);

            $category->name = $request->name;
            $category->product_category_id = $request->product_category_id;
            $category->modified_at = Carbon::now();
            $category->modified_by = Auth::user()->id;
            $category->save();

            return redirect()->route('product-sub-category.index')->with('message', 'Product Sub Category has been successfully updated.');

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

            $category = ProductSubCategory::findOrFail($id);
            $category->update($data);

            return redirect()->route('product-sub-category.index')->with('message','Product Sub Category has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
