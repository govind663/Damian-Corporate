<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

}
