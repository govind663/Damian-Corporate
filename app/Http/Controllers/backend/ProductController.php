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

            // Delete existing images
            if (!empty($bannerImagePaths)) {
                foreach ($bannerImagePaths as $existingImage) {
                    $existingImagePath = public_path('/damian_corporate/product/product_other_images/' . $existingImage);
                    if (File::exists($existingImagePath)) {
                        File::delete($existingImagePath); // Delete the image file
                    }
                }
            }

            // Clear the array of existing images
            $bannerImagePaths = [];

            // Check if new images are uploaded
            if ($request->hasFile('product_other_images')) {
                // Add new images to the paths array
                foreach ($request->file('product_other_images') as $image) {
                    // Validate the image before processing (add your validation rules)
                    $new_name = Str::uuid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/damian_corporate/product/product_other_images'), $new_name);
                    $bannerImagePaths[] = $new_name; // Add the new image to the array
                }
            }

            // Update the product_other_images with the new image paths
            $product->product_other_images = json_encode($bannerImagePaths);

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
        $product->product_other_images = json_decode($product->product_other_images, true);

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
            'colors' => $colors,
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


            // Get existing images from the database
            $existingImages = json_decode($product->product_other_images, true) ?? [];

            // Remove marked images
            if ($request->has('images_to_remove')) {
                foreach ($request->images_to_remove as $imageToRemove) {
                    $imagePath = public_path('/damian_corporate/product/product_other_images/' . $imageToRemove);

                    // Delete the file from storage
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }

                    // Remove the image name from the existing images array
                    $existingImages = array_filter($existingImages, fn($image) => $image !== $imageToRemove);
                }
            }

            // Add new images
            if ($request->hasFile('product_other_images')) {
                foreach ($request->file('product_other_images') as $image) {
                    // Validate the image (optional: add validation rules)
                    $newName = Str::uuid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/damian_corporate/product/product_other_images'), $newName);
                    $existingImages[] = $newName;
                }
            }

            // Update the product with the final list of images
            $product->product_other_images = json_encode(array_values($existingImages)); // Reindex the array

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
