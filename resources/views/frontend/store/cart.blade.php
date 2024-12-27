@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Cart
@endsection

@push('styles')
@endpush

@section('content')
    <!-- breadcrumb area start -->
    <div class="bre-sec">
        <div class="container-fluid home-container">
           <div class="row">
              <div class="col-xxl-12">
                 <div class="breadcrumb-content">
                    <div class="breadcrumb__list">
                       <span><a href="{{ route('frontend.home') }}">Home</a></span>
                       <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                       <span>Cart</span>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
    <!-- breadcrumb area end -->

    <!-- Cart area start-->
    <section class="cart-section pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="product-price">Unit Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#">
                                                <img src="{{ asset('frontend/assets/img/wishlist/wishlist-product-1.webp') }}" alt="">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="#">Ultra Powerful Router</a>
                                        </td>
                                        <td class="product-price"><span class="amount">₹ 10,000</span></td>
                                        <td class="product-quantity text-center">
                                            <div class="tp-shop-quantity">
                                                <div class="tp-quantity p-relative">
                                                    <div class="qty_button cart-minus tp-cart-minus"><i class="fal fa-minus"></i></div>
                                                    <input type="text" value="1">
                                                    <div class="qty_button cart-plus tp-cart-plus"><i class="fal fa-plus"></i></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">₹ 10,000</span></td>
                                        <td class="product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>

                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="{{ asset('frontend/assets/img/wishlist/wishlist-product-2.webp') }}" alt=""></a>
                                        </td>
                                        <td class="product-name">
                                            <a href="#">Ultra Powerful Router</a>
                                        </td>
                                        <td class="product-price"><span class="amount">₹ 10,000</span></td>
                                        <td class="product-quantity text-center">
                                            <div class="tp-shop-quantity">
                                                <div class="tp-quantity p-relative">
                                                    <div class="qty_button cart-minus tp-cart-minus"><i class="fal fa-minus"></i></div>
                                                    <input type="text" value="2">
                                                    <div class="qty_button cart-plus tp-cart-plus"><i class="fal fa-plus"></i></div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="product-subtotal"><span class="amount">₹ 10,000</span></td>
                                        <td class="product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon1">
                                        <button class="tp-btn-theme" name="continue_shopping" type="submit">
                                            <i class="fa-sharp fa-regular fa-arrow-left"></i>
                                            <span> Continue Shopping</span>
                                        </button>
                                    </div>

                                    <div class="coupon2">
                                        <button class="tp-btn-theme" name="update_cart" type="submit">
                                            <span>Update Cart</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="cart-page-total-sec">
                                    <h2>Coupon Discount</h2>
                                    <!-- <p>Enter your coupon code if you have one.</p> -->
                                    <div class="coupon-input-sec">
                                        <input type="text" name="name" placeholder="Coupon code">
                                    </div>
                                    <a class="tp-btn-theme text-center w-100" href="#">
                                        <span>Apply Coupon</span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="cart-page-total-sec">
                                    <h2>Cart totals</h2>
                                    <ul class="mb-20">
                                        <li>Total <span>₹ 30,000</span></li>
                                    </ul>
                                    <a class="tp-btn-theme text-center w-100" href="{{ route('frontend.checkout') }}">
                                        <span>Proceed To Checkout</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart area end-->

@endsection

@push('scripts')

@endpush
