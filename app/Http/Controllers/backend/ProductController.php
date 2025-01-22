<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\ProductRequest;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductColors;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('product_category', 'product_sub_category', 'product_colors')->orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.product.store.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ===== Fetch Product Category
        $productCategories = ProductCategory::orderBy("id","desc")->whereNull('deleted_at')->get();

        // ===== Fetch Product Sub Category
        $productSubCategories = ProductSubCategory::orderBy("id","desc")->whereNull('deleted_at')->get();

        // ===== Fetch Product Colors
        $colors = ProductColors::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.product.store.create', [
            'productCategories' => $productCategories,
            'productSubCategories' => $productSubCategories,
            'colors' => $colors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $request->validated();
        try {

            $product = new Product();

            // ==== Upload (image)
            if ($request->hasFile('project_image')) {
                $image = $request->file('project_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/product/project_image/'), $new_name);

                $image_path = "/damian_corporate/product/project_image/" . $new_name;
                $product->image = $new_name;
            }

            $product->product_category_id = $request->product_category_id ?? null;
            $product->product_sub_category_id = $request->product_sub_category_id ?? null;
            $product->product_colors_id = $request->product_colors_id ?? null;
            $product->name = $request->name ?? null;
            $product->slug = $request->slug ?? null;
            $product->description = $request->description ?? null;
            $product->price = $request->price ?? null;
            $product->discount_type = $request->discount_type ?? null;
            $product->discount_price_in_amount = $request->discount_price_in_amount ?? null;
            $product->discount_price_after_ammount = $request->discount_price_after_ammount ?? null;
            $product->discount_price_in_percentage = $request->discount_price_in_percentage ?? null;
            $product->discount_price_after_percentage = $request->discount_price_after_percentage ?? null;
            $product->length = $request->length ?? null;
            $product->height = $request->height ?? null;
            $product->width = $request->width ?? null;
            $product->depth = $request->depth ?? null;
            $product->seat_height = $request->seat_height ?? null;
            $product->product_type = $request->product_type ?? null;
            $product->status = $request->status ?? null;
            $product->inserted_at = Carbon::now();
            $product->inserted_at = Carbon::now();
            $product->inserted_by = Auth::user()->id;

            // ==== Generate Product SKU Code (Six Digit Number + Product ID + Random Number)
            $product_sku_code = 'DCP' . str_pad($product->id, 6, '0', STR_PAD_LEFT) . rand(1000, 9999);
            $product->product_sku = $product_sku_code;
            $product->save();

            return redirect()->route('product.index')->with('message','Product has been successfully created.');

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
        $product = Product::findOrFail($id);

        // ===== Fetch Product Category
        $productCategories = ProductCategory::orderBy("id","desc")->whereNull('deleted_at')->get();

        // ===== Fetch Product Sub Category
        $productSubCategories = ProductSubCategory::orderBy("id","desc")->whereNull('deleted_at')->get();

        // ===== Fetch Product Colors
        $colors = ProductColors::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.product.store.edit', [
            'product' => $product,
            'productCategories' => $productCategories,
            'productSubCategories' => $productSubCategories,
            'colors' => $colors
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $request->validated();
        try {

            $product = Product::findOrFail($id);

            // Check and upload the banner image
            if ($request->hasFile('project_image')) {
                // Delete the old image if it exists
                if ($product->project_image) {
                    $oldImagePath = public_path('/damian_corporate/product/project_image/' . $product->project_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('project_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/product/project_image/'), $new_name);

                // Update the banner object with the new image path
                $product->image = $new_name;
            }


            // Check and upload the other images
            if ($request->hasFile('product_other_images')) {
                // Delete the old images if they exist first before processing the new images
                if ($product->product_other_images) {
                    $oldImagePath = public_path('/damian_corporate/product/product_other_images/' . $product->product_other_images);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath); // Delete the image file
                    }
                }

                // Process the new images
                $images = $request->file('product_other_images');
                foreach ($images as $image) {
                    $extension = $image->getClientOriginalExtension();
                    $new_name = time() . rand(10, 999) . '.' . $extension;
                    $image->move(public_path('/damian_corporate/product/product_other_images/'), $new_name);
                }
                $product->product_other_images = json_encode($images);

            }


            $product->product_category_id = $request->product_category_id ?? null;
            $product->product_sub_category_id = $request->product_sub_category_id ?? null;
            $product->product_colors_id = $request->product_colors_id ?? null;
            $product->name = $request->name ?? null;
            $product->slug = $request->slug ?? null;
            $product->description = $request->description ?? null;
            $product->price = $request->price ?? null;
            $product->discount_type = $request->discount_type ?? null;
            $product->discount_price_in_amount = $request->discount_price_in_amount ?? null;
            $product->discount_price_after_ammount = $request->discount_price_after_ammount ?? null;
            $product->discount_price_in_percentage = $request->discount_price_in_percentage ?? null;
            $product->discount_price_after_percentage = $request->discount_price_after_percentage ?? null;
            $product->length = $request->length ?? null;
            $product->height = $request->height ?? null;
            $product->width = $request->width ?? null;
            $product->depth = $request->depth ?? null;
            $product->seat_height = $request->seat_height ?? null;
            $product->product_type = $request->product_type ?? null;
            $product->status = $request->status ?? null;
            $product->modified_at = Carbon::now();
            $product->modified_by = Auth::user()->id;
            $product->save();

            return redirect()->route('product.index')->with('message', 'Product has been successfully updated.');

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

            $product = Product::findOrFail($id);
            $product->update($data);

            return redirect()->route('product.index')->with('message','Product has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
