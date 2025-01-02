@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Wishlist
@endsection

@push('styles')
<style>
    .bre-sec {
        height: 60px !important;
    }
    .bre-sec .breadcrumb-content {
        padding: 15px 0px 0px !important;
    }
</style>
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
                       <span>Wishlist</span>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
    <!-- breadcrumb area end -->

    <!--section start-->
    <section class="wishlist-section">
        <div class="container">
            <div class="table-responsive">
                <table class="table wishlist-table">
                    <thead>
                        <tr class="table-head wishlist-table-head">
                            <th>image</th>
                            <th>product name</th>
                            <th>price</th>
                            <th>availability</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="#">
                                    <img src="{{ asset('frontend/assets/img/wishlist/wishlist-product-1.webp') }}" alt="">
                                </a>
                            </td>
                            <td><a href="#">EPIC Table - Danform</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <p>in stock</p>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">₹ 10,000</h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">
                                            <a href="#" class="cart">
                                                <i class="fa-regular fa-cart-shopping"></i>
                                            </a>
                                            <a href="#" class="icon me-1">
                                                <i class="fa-solid fa-xmark"></i>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>₹ 10,000</h2>
                            </td>
                            <td>
                                <p>in stock</p>
                            </td>
                            <td>
                                <div class="icon-box d-flex gap-2 justify-content-center">
                                    <a href="#" class="cart">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </a>
                                    <a href="#" class="icon me-1">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">
                                    <img src="{{ asset('frontend/assets/img/wishlist/wishlist-product-2.webp') }}" class="img-fluid" alt="">
                                </a>
                            </td>
                            <td><a href="#">ORBIT Chair - Danform</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <p>in stock</p>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">₹ 10,000</h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">
                                            <a href="#" class="cart">
                                                <i class="fa-regular fa-cart-shopping"></i>
                                            </a>
                                            <a href="#" class="icon me-1">
                                                <i class="fa-solid fa-xmark"></i>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>₹ 10,000</h2>
                            </td>
                            <td>
                                <p>in stock</p>
                            </td>
                            <td>
                                <div class="icon-box d-flex gap-2 justify-content-center">
                                    <a href="#" class="cart">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </a>
                                    <a href="#" class="icon me-1">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">
                                    <img src="{{ asset('frontend/assets/img/wishlist/wishlist-product-3.webp') }}" alt="" class="img-fluid">
                                </a>
                            </td>
                            <td><a href="#">Comb Chair - Kristensen</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <p>in stock</p>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">₹ 10,000</h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">
                                            <a href="#" class="cart">
                                                <i class="fa-regular fa-cart-shopping"></i>
                                            </a>
                                            <a href="#" class="icon me-1">
                                                <i class="fa-solid fa-xmark"></i>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>₹ 10,000</h2>
                            </td>
                            <td>
                                <p>in stock</p>
                            </td>
                            <td>
                                <div class="icon-box d-flex gap-2 justify-content-center">
                                    <a href="#" class="cart">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </a>
                                    <a href="#" class="icon me-1">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="wishlist-buttons">
                <a href="category-page.html" class="tp-btn-border">
                    <i class="fa-sharp fa-regular fa-arrow-left"></i>
                    <span>continue shopping</span>
                </a>
                <a href="{{ route('frontend.checkout') }}" class="tp-btn-border">
                    <span>Checkout</span>
                </a>
            </div>
        </div>
    </section>
    <!--section end-->


@endsection

@push('scripts')

@endpush
