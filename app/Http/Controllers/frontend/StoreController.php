<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Citizen;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColors;
use App\Models\ProductSubCategory;
use App\Models\ProductFaq;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    // ==== Products
    public function storeProductsList()
    {
        // ===== Fetch Product Category
        $productCategories = ProductCategory::orderBy("id","asc")->whereNull('deleted_at')->get();

        // ===== Fetch Product Sub Category
        $productSubCategories = ProductSubCategory::orderBy("id","asc")->whereNull('deleted_at')->get();

        // ===== Fetch Product Colors
        $colors = ProductColors::orderBy("id","asc")->whereNull('deleted_at')->get();

        // ==== Fetch Product
        $products = Product::orderBy("id","desc")->whereNull('deleted_at')->get();

        // ==== Fetch Product Faq
        $productfaqs = ProductFaq::orderBy("id","asc")->whereNull('deleted_at')->get();

        return view('frontend.store.products', [
            'products' => $products,
            'productCategories' => $productCategories,
            'productSubCategories' => $productSubCategories,
            'colors' => $colors,
            'productfaqs' => $productfaqs,
        ]);
    }

    // ==== Product Details
    public function productDetails( $slug)
    {
        // ==== Fetch Product
        $product = Product::where('slug', $slug)->first();

        // Decode the JSON data for other images
        $productOtherImages = $product->product_other_images ? json_decode($product->product_other_images, true) : [];

        return view('frontend.store.product-details', [
            'product' => $product,
            'productOtherImages' => $productOtherImages,
        ]);
    }

    // ==== Products Fillter
    public function filterProducts(Request $request)
    {
        // ===== Fetch Product Category
        $productCategories = ProductCategory::orderBy("id", "asc")->whereNull('deleted_at')->get();

        // ===== Fetch Product Sub Category
        $productSubCategories = ProductSubCategory::orderBy("id", "asc")->whereNull('deleted_at')->get();

        // ===== Fetch Product Colors
        $colors = ProductColors::orderBy("id", "asc")->whereNull('deleted_at')->get();

        // ==== Fetch Product Faq
        $productfaqs = ProductFaq::orderBy("id", "asc")->whereNull('deleted_at')->get();

        // Request categories
        $categories = $request->categories;

        // Request subCategories
        $subCategories = $request->subCategories;

        // Request colors
        $colors = $request->colors;

        // Request minPrice
        $minPrice = $request->minPrice;

        // Request maxPrice
        $maxPrice = $request->maxPrice;

        // ==== Fetch Products
        $query = Product::query()->whereNull('deleted_at');

        // Apply category filter if selected
        if ($categories) {
            $query->whereIn('product_category_id', $categories);
        }

        // Apply subcategory filter if selected
        if ($subCategories) {
            $query->whereIn('product_sub_category_id', $subCategories);
        }

        // Apply color filter if selected
        if ($colors) {
            $query->whereIn('product_colors_id', $colors);
        }

        // Apply price range if selected
        if ($minPrice && $maxPrice) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        $products = $query->orderBy("id", "desc")->get();

        // Return only the products section
        $data = [
            'products' => $products,
            'productCategories' => $productCategories,
            'productSubCategories' => $productSubCategories,
            'colors' => $colors,
            'productfaqs' => $productfaqs,
            'categories_id' => $categories,
            'subCategories_id' => $subCategories,
            'color_id' => $colors,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
        ];

        // dd($data);

        return response()->json($data);
    }

    // ==== Add to Cart
    public function cart()
    {
        return view('frontend.store.cart');
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $citizenId = $request->input('citizen_id');

        // Check if the product is already in the cart for the logged-in user
        $existingCart = Cart::where('citizen_id', $citizenId)
                            ->where('product_id', $productId)
                            ->first();

        if ($existingCart) {
            // If the product already exists, return a message
            return response()->json(['info' => false, 'message' => 'Product already exists in your cart.']);
        } else {
            // If the product doesn't exist, create a new cart entry
            $cart = new Cart();
            $cart->citizen_id = $citizenId;
            $cart->product_id = $productId;
            $cart->quantity = 1; // Default quantity when adding the product for the first time
            $cart->inserted_by = Auth::guard('citizen')->id();
            $cart->inserted_at = Carbon::now();
            $cart->save();

            return response()->json(['success' => true, 'message' => 'Product added to cart successfully!']);
        }
    }

    // ==== Add to Wishlist
    public function wishlist()
    {
        return view('frontend.store.wishlist');
    }

    public function addToWishlist(Request $request)
    {
        $productId = $request->input('product_id');
        $citizenId = $request->input('citizen_id');

        // Check if the product is already in the wishlist for the logged-in user
        $existingWishlist = Wishlist::where('citizen_id', $citizenId)
                                    ->where('product_id', $productId)
                                    ->first();

        if ($existingWishlist) {
            // If the product already exists, return a message
            return response()->json(['info' => false, 'message' => 'This product is already in your wishlist.']);
        } else {
            // If the product doesn't exist in the wishlist, add it
            $wishlist = new Wishlist();
            $wishlist->citizen_id = $citizenId;
            $wishlist->product_id = $productId;
            $wishlist->quantity = 1; // Default quantity when adding the product for the first time
            $wishlist->inserted_by = Auth::guard('citizen')->id();
            $wishlist->inserted_at = Carbon::now();
            $wishlist->save();

            return response()->json(['success' => true, 'message' => 'Product added to wishlist successfully!']);
        }
    }

    // ==== Checkout
    public function checkout()
    {
        return view('frontend.store.checkout');
    }

    // ==== MY Profile
    public function myProfile()
    {
        return view('frontend.store.my-profile');
    }

    // ==== Orders
    public function orders()
    {
        return view('frontend.store.orders');
    }

    // ==== Address
    public function address()
    {
        return view('frontend.store.address');
    }

    // ==== Account Details
    public function accountDetails()
    {
        return view('frontend.store.account-details');
    }

    // ==== Change Password
    public function changePassword()
    {
        return view('frontend.store.change-password');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ],[
            'current_password.required' => 'Current Password is required',
            'password.required' => 'New Password is required',
            'password.confirmed' => 'Password and Confirm Password does not match',
            'password.min' => 'Password must be at least 8 characters.',
            'password_confirmation.required' => 'Confirm Password is required',
            'password_confirmation.min' => 'Confirm Password must be at least 8 characters.',

        ]);


        #Match The Old Password
        if(!Hash::check($request->current_password, Auth::guard('citizen')->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        Citizen::whereId(Auth:: guard('citizen')->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('frontend.myProfile')->with("message", "Password changed successfully!");
    }
}
