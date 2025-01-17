<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Citizen;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColors;
use App\Models\ProductSubCategory;
use App\Models\ProductFaq;
use App\Models\State;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

    // ==== Cart
    public function cart()
    {
        // Check if a citizen is authenticated
        $authenticatedUser = Auth::guard('citizen')->user();
        if (!$authenticatedUser) {
            // Redirect to login page or show an error
            return redirect()->route('frontend.citizen.login')->with('error', 'You need to be logged in to view your cart.');
        }

        // ===== Fetch Product
        $products = Product::orderBy("id", "desc")->whereNull('deleted_at')->get();

        // ===== Fetch Cart
        $cartItems = Cart::with('product', 'citizen')->where('citizen_id', Auth::guard('citizen')->user()->id)->whereNull('deleted_at')->get();
        // dd($cartItems);

        return view('frontend.store.cart', [
            'products' => $products,
            'cartItems' => $cartItems,
        ]);
    }

    // ==== Add To Cart
    public function addToCart(Request $request)
    {
        // Check if the user is logged in
        if (!Auth::guard('citizen')->check()) {
            return response()->json(['success' => false, 'message' => 'Please log in to add products to your cart.'], 401);
        }

        $productId = $request->input('product_id');
        $citizenId = Auth::guard('citizen')->id(); // Get logged-in user's ID

        // Fetch the product from the database
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
        }

        // Check if the product is already in the cart for the logged-in user
        $existingCart = Cart::where('citizen_id', $citizenId)
                            ->where('product_id', $productId)
                            ->first();

        if ($existingCart) {
            // If the product already exists, update the quantity and product_total_price
            $existingCart->quantity += 1;
            $existingCart->product_total_price += $product->discount_price_after_percentage;
            $existingCart->modified_by = $citizenId;
            $existingCart->modified_at = Carbon::now();
            $existingCart->save();

            return response()->json(['success' => true, 'message' => 'Product quantity updated successfully!']);
        } else {
            // If the product does not exist, create a new cart item
            $cart = new Cart();
            $cart->citizen_id = $citizenId;
            $cart->product_id = $productId;
            $cart->quantity = 1;
            $cart->product_total_price = $product->discount_price_after_percentage;
            $cart->inserted_by = $citizenId;
            $cart->inserted_at = Carbon::now();
            $cart->save();

            return response()->json(['success' => true, 'message' => 'Product added to cart successfully!']);
        }
    }

    // ==== Update Cart Quantity
    public function updateCartQuantity(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ], [
            'quantity.min' => 'Invalid quantity.',
        ]);

        $productId = $request->product_id;
        $quantity = $request->quantity;

        $citizenId = $request->citizen_id ?? Auth::guard('citizen')->id();

        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found.']);
        }

        $newTotalPrice = $product->discount_price_after_percentage * $quantity;

        $cart = Cart::updateOrCreate(
            [
                'citizen_id' => $citizenId,
                'product_id' => $productId,
            ]
        );
        $cart->quantity = $quantity;
        $cart->product_total_price = $newTotalPrice;
        $cart->modified_by = Auth::guard('citizen')->id();
        $cart->modified_at = Carbon::now();
        $cart->save();

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully.',
            'new_total_price' => $newTotalPrice,
        ]);
    }

    // ==== Remove Cart Item
    public function removeCartItem(Request $request)
    {
        $citizenId = Auth::guard('citizen')->id();

        if (!$citizenId) {
            return response()->json(['success' => false, 'message' => 'User not authenticated.']);
        }

        $productId = $request->product_id;

        if (!$productId) {
            return response()->json(['success' => false, 'message' => 'Invalid product ID.']);
        }

        $cartItem = Cart::where('citizen_id', $citizenId)
            ->where('product_id', $productId)
            ->first();

        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Cart item not found.']);
        }

        $cartItem->deleted_by = $citizenId;
        $cartItem->deleted_at = now();
        $cartItem->delete();

        $newTotalPrice = Cart::where('citizen_id', $citizenId)->sum('product_total_price');

        return response()->json([
            'success' => true,
            'message' => 'Item removed from the cart successfully.',
            'new_total_price' => $newTotalPrice,
        ]);
    }

    // ==== Get Cart Total
    public function getCartTotal(Request $request)
    {
        // Get the authenticated user ID
        $userId = Auth::guard('citizen')->id();

        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'User not authenticated.']);
        }

        // Calculate the total price
        $totalPrice = Cart::where('citizen_id', $userId)
            ->whereNull('deleted_at')
            ->sum('product_total_price');

        return response()->json([
            'success' => true,
            'total_price' => $totalPrice,
        ]);
    }

    // ==== Wishlist
    public function wishlist()
    {
        // Check if a citizen is authenticated
        $authenticatedUser = Auth::guard('citizen')->user();
        if (!$authenticatedUser) {
            // Redirect to login page or show an error
            return redirect()->route('frontend.citizen.login')->with('error', 'You need to be logged in to view your wishlist.');
        }

        // ===== Fetch Product
        $products = Product::orderBy("id", "desc")->whereNull('deleted_at')->get();

        // ===== Fetch Wishlist
        $wishlistItems = Wishlist::with('product', 'citizen')->where('citizen_id', Auth::guard('citizen')->user()->id)->whereNull('deleted_at')->get();
        // dd($wishlistItems);

        return view('frontend.store.wishlist', [
            'products' => $products,
            'wishlistItems' => $wishlistItems,
        ]);
    }

    // ==== Add To Wishlist
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

    // ==== Remove Wishlist Item
    public function destroy($id)
    {
        // Assuming you have a Wishlist model
        $wishlistItem = Wishlist::find($id);

        if ($wishlistItem) {
            $wishlistItem->deleted_by = Auth::guard('citizen')->id();
            $wishlistItem->deleted_at = Carbon::now();
            $wishlistItem->delete();

            return response()->json(['success' => true, 'message' => 'Item removed from wishlist.']);
        }

        return response()->json(['success' => false, 'message' => 'Item not found.'], 404);
    }

    // ==== Checkout
    public function checkout()
    {
        // ===== Fetch Product
        $products = Product::orderBy("id", "desc")->whereNull('deleted_at')->get();

        // ===== Fetch Cart
        $cartItems = Cart::with('product', 'citizen')->where('citizen_id', Auth::guard('citizen')->user()->id)->whereNull('deleted_at')->get();
        // dd($cartItems);

        $productId = Cart::where('citizen_id', Auth::guard('citizen')->user()->id)->first();

        // ===== Fetch States
        $states = State::orderBy("id","asc")->where('status', '1')->whereNull('deleted_at')->get(['id', 'state_name']);
        // dd($states);

        return view('frontend.store.checkout', [
            'products' => $products,
            'cartItems' => $cartItems,
            'productId' => $productId,
            'states' => $states
        ]);
    }

    // ==== MY Profile
    public function myProfile()
    {
        return view('frontend.store.my-profile');
    }

    // ==== Orders
    public function orders()
    {
        $orders = Order::with('product', 'citizen', 'cart')->where('citizen_id', Auth::guard('citizen')->user()->id)->whereNull('deleted_at')->paginate(10);;
        // dd($orders);

        foreach ($orders as $key => $order) {
            $order->order_date = Carbon::parse($order->order_date)->format('d M, Y');
            $order->payment_date = Carbon::parse($order->payment_date)->format('d M, Y');
        }
        // dd($orders);

        return view('frontend.store.orders', [
            'orders' => $orders
        ]);
    }

    // ==== Address
    public function address()
    {
        return view('frontend.store.address');
    }

    // ==== Billing Address
    public function updateBillingAddress(Request $request, $id)
    {
        $request->validate([
            'billing_address' => 'required|string|max:500',
        ],[
            'billing_address.required' => 'Billing Address is required',
        ]);

        try {

            $citizen = Citizen::findOrFail($id);

            $user = Auth::guard('citizen')->user();

            if (!$user) {
                return redirect()->back()->with('error', 'User not authenticated.');
            }

            $citizen->billing_address = $request->billing_address;
            $citizen->updated_at = Carbon::now();
            $citizen->updated_by = $user->id;
            $citizen->save();

            return redirect()->route('frontend.address')->with('message', 'Billing Address Updated Successfully!');
        } catch (\Exception $ex) {
            Log::error('Error updating billing address: ' . $ex->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while updating the Billing Address. Please try again.');
        }
    }

    // ==== Shipping Address
    public function updateShippingAddress(Request $request, $id)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:500',
        ],[
            'shipping_address.required' => 'Shipping Address is required',
        ]);

        try {

            $citizen = Citizen::findOrFail($id);

            $user = Auth::guard('citizen')->user();

            if (!$user) {
                return redirect()->back()->with('error', 'User not authenticated.');
            }

            $citizen->shipping_address = $request->shipping_address;
            $citizen->updated_at = Carbon::now();
            $citizen->updated_by = $user->id;
            $citizen->save();

            return redirect()->route('frontend.address')->with('message', 'Shipping Address Updated Successfully!');
        } catch (\Exception $ex) {
            Log::error('Error updating shipping address: ' . $ex->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while updating the Shipping Address. Please try again.');
        }
    }

    // ==== Account Details
    public function accountDetails()
    {
        // ===== Fetch States
        $states = State::orderBy("id","asc")->where('status', '1')->whereNull('deleted_at')->get(['id', 'state_name']);
        // dd($states);

        return view('frontend.store.account-details', [
            'states' => $states
        ]);
    }

    // ==== Update Account Details
    public function updateAccountDetails(Request $request, $id)
    {
        // Validate the form data
        // $request->validate([
        //     'f_name' => 'required|string|max:255',
        //     'l_name' => 'required|string|max:255',
        //     'email' => [
        //         'required',
        //         'email',
        //         'max:255'
        //     ],
        //     'phone' => [
        //         'required',
        //     ],
        //     'postcode' => [
        //         'required',
        //     ],
        //     'city' => [
        //         'required',
        //         'string',
        //         'max:255'
        //     ],
        //     'state' => [
        //         'required',
        //         'integer',
        //         'exists:states,id'
        //     ],
        //     'country' => [
        //         'required',
        //         'string',
        //         'max:255'
        //     ],
        //     'billing_address' => [
        //         'required',
        //         'string',
        //         'max:255'
        //     ]
        // ], [
        //     'f_name.required' => __('First Name is required'),
        //     'f_name.string' => __('First Name must be a string'),
        //     'f_name.max' => __('First Name must not exceed 255 characters'),

        //     'l_name.required' => __('Last Name is required'),
        //     'l_name.string' => __('Last Name must be a string'),
        //     'l_name.max' => __('Last Name must not exceed 255 characters'),

        //     'email.required' => __('Email is required'),
        //     'email.email' => __('Invalid email format'),
        //     'email.regex' => __('Invalid email format'),
        //     'email.max' => __('Email must not exceed 255 characters'),

        //     'phone.required' => __('Phone is required'),

        //     'postcode.required' => __('Postcode is required'),

        //     'city.required' => __('City is required'),
        //     'city.string' => __('City must be a string'),
        //     'city.max' => __('City must not exceed 255 characters'),

        //     'state.required' => __('State is required'),
        //     'state.integer' => __('State must be an integer'),
        //     'state.exists' => __('State does not exist'),

        //     'country.required' => __('Country is required'),
        //     'country.string' => __('Country must be a string'),
        //     'country.max' => __('Country must not exceed 255 characters'),

        //     'profile_image.required' => __('Profile Image is required'),
        //     'profile_image.image' => __('Profile Image must be an image'),
        //     'profile_image.mimes' => __('Profile Image must be a file of type: jpg, jpeg, png, svg'),
        //     'profile_image.max' => __('Profile Image must not exceed 2MB'),
        // ]);

        try {

            $id = decrypt($id);
            $citizen = Citizen::findOrFail($id);

            // Check and upload the profile image if provided
            if ($request->hasFile('profile_image')) {

                // Check if the old image exists and delete it
                if ($citizen->profile_image) {
                    $oldImagePath = public_path('/damian_corporate/citizen/profile_image/' . $citizen->profile_image);

                    if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                        unlink($oldImagePath);
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Upload the new profile image
                $profileImage = $request->file('profile_image');
                $extension = $profileImage->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $profileImage->move(public_path('/damian_corporate/citizen/profile_image/'), $new_name);
                $citizen->profile_image = $new_name;

            }

            $citizen->f_name = $request->f_name;
            $citizen->l_name = $request->l_name;
            $citizen->email = $request->email;
            $citizen->phone = $request->phone;
            $citizen->postcode = $request->postcode;
            $citizen->city = $request->city;
            $citizen->state = $request->state;
            $citizen->country = $request->country;
            // $citizen->billing_address = $request->billing_address;
            // $citizen->shipping_address = $request->shipping_address;
            $citizen->updated_at = Carbon::now();
            $citizen->updated_by = Auth::guard('citizen')->user()->id;
            $citizen->save();

            return redirect()->route('frontend.accountDetails')->with('message', 'Account Details Updated Successfully!');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Something went wrong while updating the Account Details. Please try again.');
        }
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
