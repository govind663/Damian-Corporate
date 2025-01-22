<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\ProductImageRequest;
use App\Models\ProductImage;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productImages = ProductImage::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.product.images.index', [
            'productImages' => $productImages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ===== Fetch Product
        $products = Product::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.product.images.create', [
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductImageRequest $request)
    {
        $request->validated();
        try {

            $product = new ProductImage();

            // ==== Upload Product Image
            if ($request->hasFile('product_other_images')) {
                $image = $request->file('product_other_images');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/product/product_other_images/'), $new_name);

                $image_path = "/damian_corporate/product/product_other_images/" . $new_name;
                $product->product_other_images = $new_name;
            }

            $product->product_id = $request->product_id ?? null;
            $product->inserted_at = Carbon::now();
            $product->inserted_at = Carbon::now();
            $product->inserted_by = Auth::user()->id;
            $product->save();

            return redirect()->route('product-image.index')->with('message','Product Image has been successfully created.');

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
        $productImage = ProductImage::findOrFail($id);

        // ===== Fetch Product
        $products = Product::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.product.images.edit', [
            'productImage' => $productImage,
            'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductImageRequest $request, string $id)
    {
        $request->validated();
        try {

            $productImage = ProductImage::findOrFail($id);

            // Check and upload the banner image
            if ($request->hasFile('product_other_images')) {
                // Delete the old image if it exists
                if ($productImage->product_other_images) {
                    $oldImagePath = public_path('/damian_corporate/product/product_other_images/' . $productImage->product_other_images);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('product_other_images');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/product/product_other_images/'), $new_name);

                // Update the banner object with the new image path
                $productImage->product_other_images = $new_name;
            }

            $productImage->product_id = $request->product_id ?? null;
            $productImage->modified_at = Carbon::now();
            $productImage->modified_by = Auth::user()->id;
            $productImage->save();

            return redirect()->route('product-image.index')->with('message', 'Product Image has been successfully updated.');

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

            $productImage = ProductImage::findOrFail($id);
            $productImage->update($data);

            return redirect()->route('product-image.index')->with('message','Product Image has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
