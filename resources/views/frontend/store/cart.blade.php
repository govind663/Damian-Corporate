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
                            <span><a href="{{ route('frontend.home') }}" title="Home">Home</a></span>
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
    <section class="add-to-cart form-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="card-order">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="img-wrapper">
                                    <a href="{{ route('frontend.product.details') }}" title="wishlist-product-3" class="img-link">
                                        <img src="{{ asset('frontend/assets/img/wishlist/wishlist-product-1.webp') }}" class="img-responsive" alt="wishlist-product-3" title="wishlist-product-3">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-price">
                                    <p>₹ 10,000 /-</p>
                                </div>
                                <div class="product-heading">
                                    <h3>
                                        EPIC Table - Danform
                                    </h3>
                                    <a href="#" title="Remove this item" class="remove">
                                        <p>
                                            <i class="fa fa-trash"></i>
                                            Remove Item
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="quantity-sec-new p-relative">
                                    <div class="qty_button cart-minus tp-cart-minus">
                                        <i class="fal fa-minus"></i>
                                    </div>
                                    <input type="text" value="1" name="qty">
                                    <div class="qty_button cart-plus tp-cart-plus">
                                        <i class="fal fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="hr-line">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="img-wrapper">
                                    <a href="{{ route('frontend.product.details') }}" title="wishlist-product-2" class="img-link">
                                        <img src="{{ asset('frontend/assets/img/wishlist/wishlist-product-2.webp') }}" class="img-responsive" alt="wishlist-product-2" title="wishlist-product-2">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-price">
                                    <p>₹ 10,000 /-</p>
                                </div>
                                <div class="product-heading">
                                    <h3>EPIC Table - Danform</h3>
                                    <a href="#" title="Remove this item" class="remove">
                                        <p>
                                            <i class="fa fa-trash"></i>
                                            Remove Item
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="quantity-sec-new p-relative">
                                    <div class="qty_button cart-minus tp-cart-minus">
                                        <i class="fal fa-minus"></i>
                                    </div>
                                    <input type="text" value="1" name="qty">
                                    <div class="qty_button cart-plus tp-cart-plus">
                                        <i class="fal fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="hr-line">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="img-wrapper">
                                    <a href="{{ route('frontend.product.details') }}" title="wishlist-product-3" class="img-link">
                                        <img src="{{ asset('frontend/assets/img/wishlist/wishlist-product-3.webp') }}" class="img-responsive" alt="wishlist-product-3" title="wishlist-product-3">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-price">
                                    <p>₹ 10,000 /-</p>
                                </div>
                                <div class="product-heading">
                                    <h3>EPIC Table - Danform</h3>
                                    <a href="#" title="Remove this item" class="remove">
                                        <p>
                                            <i class="fa fa-trash"></i>Remove Item
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="quantity-sec-new p-relative">
                                    <div class="qty_button cart-minus tp-cart-minus">
                                        <i class="fal fa-minus"></i>
                                    </div>
                                    <input type="text" value="1" name="qty">
                                    <div class="qty_button cart-plus tp-cart-plus">
                                        <i class="fal fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="hr-line">
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="cart-item-div">
                        <h2>Cart Totals </h2>
                        <div class="cart-total-sec">
                            <ul class="cart-listing-sec">
                                <li>Total <span>₹ 30,000</span></li>
                            </ul>
                        </div>
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <div class="payment-way mT20 mB20">
                                <h2> We Accept </h2>
                                <ul>
                                    <li>
                                        <img src="{{ asset('frontend/assets/img/icon/visa.png') }}" class="img-responsive" alt="visa" title="visa">
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/assets/img/icon/mastercard.jpg') }}" class="img-responsive" alt="mastercard" title="mastercard">
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/assets/img/icon/american-express.png') }}" class="img-responsive" alt="american express" title="american express">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sign-up-btn-wrap">
                            <div class="btn-sec">
                                <button class="tp-btn-theme" name="update_cart" type="submit">
                                    <span>Proceed to Checkout</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart area end-->
@endsection

@push('scripts')
@endpush
