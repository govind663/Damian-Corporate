<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Citizen;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    // ==== Products
    public function storeProductsList()
    {
        return view('frontend.store.products');
    }

    // ==== Product Details
    public function productDetails()
    {
        return view('frontend.store.product-details');
    }

    // ==== Add to Cart
    public function cart()
    {
        return view('frontend.store.cart');
    }

    // ==== Add to Wishlist
    public function wishlist()
    {
        return view('frontend.store.wishlist');
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
